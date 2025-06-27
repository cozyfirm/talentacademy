<?php

namespace App\Http\Controllers\System\Admin\Other\Inbox;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Chat\Participant;
use App\Models\Models\Core\Country;
use App\Models\Other\Inbox\Inbox;
use App\Models\Other\Inbox\InboxTo;
use App\Models\Other\Location;
use App\Models\Programs\Program;
use App\Models\Programs\ProgramApplication;
use App\Models\User;
use App\Notifications\NewInboxNotification;
use App\Notifications\NewMessageNotification;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BulkMessagesController extends Controller{
    use UserBaseTrait, ResponseTrait, LogTrait;
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
            'other' => Program::where('id', '>', 5)->pluck('title', 'id')->prepend('Svim korisnicima', 0)->prepend('Draft', 11)
        ]);
    }


    /**
     * Create database and firebase notification
     *
     * @param Request $request
     * @param User $receiver
     * @param Inbox $inbox
     * @param InboxTo $inboxTo
     * @return void
     */
    public function createNotification(Request $request, User $receiver, Inbox $inbox, InboxTo $inboxTo): void{
        try{
            /** @var $notification; Format message */
            $notification = (object)[
                'id' => $inboxTo->id,
                'title' => $inbox->title,
                'content' => $inbox->content,
                'sender' => auth()->user(),
                'inbox_to' => [
                    'id' => $inboxTo->id,
                    'inbox_id' => $inboxTo->inbox_id,
                    'read_at' => $inboxTo->read_at,
                    'created_at' => $inboxTo->created_at
                ]
            ];

            /** Send message and create database sample */
            $receiver->notify(new NewInboxNotification($notification));
        }catch (\Exception $e){
            $this->write('API: BulkMessagesController::createNotification()', $e->getCode(), $e->getMessage(), $request);
        }

    }

    public function save(Request $request): JsonResponse{
        try{
            $request['from'] = Auth::user()->id;
            $inbox = Inbox::create($request->all());

            if($request->what == 0){
                /* Sent to all users */
                $users = User::where('role', '=','user')->get();
                foreach ($users as $user){
                    $inboxTo = InboxTo::create([
                        'inbox_id' => $inbox->id,
                        'to' => $user->id
                    ]);
                    $this->createNotification($request, $user, $inbox, $inboxTo);
                }
            }else if($request->what >= 6 and $request->what <= 10){
                /* Sent to users from specific program */
                $applications = ProgramApplication::where('program_id', $request->what)->where('app_status', 'accepted')->get();

                foreach ($applications as $application){
                    $inboxTo = InboxTo::create([
                        'inbox_id' => $inbox->id,
                        'to' => $application->attendee_id
                    ]);

                    $this->createNotification($request, $application->userRel, $inbox, $inboxTo);
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
