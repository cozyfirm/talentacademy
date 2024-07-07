<?php

namespace App\Http\Controllers\System\Admin\Other\Chat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Chat\Conversation;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\Request;

class GroupChats extends Controller{
    use UserBaseTrait, ResponseTrait;
    protected string $_path = 'admin.other.chat.group-chats.';

    public function index (){
        $conversations = Conversation::where('id', '>', 0);
        $conversations = Filters::filter($conversations);

        $filters = [
            'title' => __('Naslov'),
            'from' => __('Pošiljalac')
        ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'conversations' => $conversations
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
                $applications = ProgramApplication::where('program_id', $request->what)->where('app_status', 'accepted')->get();

                foreach ($applications as $application){
                    InboxTo::create([
                        'inbox_id' => $inbox->id,
                        'to' => $application->attendee_id
                    ]);
                }
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
