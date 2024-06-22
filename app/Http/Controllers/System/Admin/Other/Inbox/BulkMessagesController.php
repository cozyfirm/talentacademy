<?php

namespace App\Http\Controllers\System\Admin\Other\Inbox;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Models\Core\Country;
use App\Models\Other\Inbox\Inbox;
use App\Models\Other\Inbox\InboxTo;
use App\Models\Other\Location;
use App\Models\Programs\Program;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BulkMessagesController extends Controller{
    use UserBaseTrait, ResponseTrait;
    protected string $_path = 'admin.other.inbox.bulk-messages.';

    public function index (){
        $messages = Inbox::where('id', '>', 0);
        $messages = Filters::filter($messages);

        $filters = [
            'title' => __('Naslov'),
            'from' => __('Pošiljalac')
        ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'messages' => $messages
        ]);
    }

    public function create (): View{
        return view($this->_path . 'create', [
            'create' => true,
            'other' => Program::pluck('title', 'id')->prepend('Svim korisnicima', 0)->prepend('Draft', 7)
        ]);
    }
    public function save(Request $request): JsonResponse{
        try{
            $request['from'] = Auth::user()->id;
            $inbox = Inbox::create($request->all());

            if($request->what == 0){
                /* Sent to all users */
                $users = User::where('role', 'user')->get();
                foreach ($users as $user){
                    InboxTo::create([
                        'inbox_id' => $inbox->id,
                        'to' => $user->id
                    ]);
                }
            }else if($request->what >= 1 and $request->what <= 6){
                /* Sent to users from specific program */
            }

            return $this->jsonSuccess(__('Uspješno ste unijeli lokaciju!'), route('system.admin.inbox.bulk-messages.preview', ['id' => $inbox->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function preview ($id): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'message' => Inbox::where('id', $id)->first()
        ]);
    }
    public function delete($id){
        try{
            Inbox::where('id', $id)->delete();
            InboxTo::where('inbox_id', $id)->delete();

            return redirect()->route('system.admin.inbox.bulk-messages')->with('success', __('Poruka uspješno obrisana!'));
        }catch (\Exception $e){
            return redirect()->route('system.admin.locations')->with('error', __('Desila se greška!'));
        }
    }
}
