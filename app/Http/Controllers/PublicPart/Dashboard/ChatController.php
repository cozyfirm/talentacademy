<?php

namespace App\Http\Controllers\PublicPart\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\Chat\Participant;
use App\Models\User;
use App\Traits\Common\CommonTrait;
use App\Traits\Common\FileTrait;
use App\Traits\Mqtt\MqttTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ChatController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait, CommonTrait, MqttTrait;
    protected string $_path = 'public-part.dashboard.chat.';
    protected int $_total_messages = 20;

    public function chat($hash = null): View | RedirectResponse{
        $user = null;

        /* All users should be member of Academy wall group */
        $groups = Conversation::whereHas('participantsRel', function ($q){
            $q->where('user_id', Auth::user()->id);
        })->where('is_group', 1)->orderBy('id')->get();

        /* If user is not a member of single group, redirect to main profile */
        if($groups->count() < 1) return redirect()->route('dashboard.my-profile');

        if(isset($hash)){
            $firstConversation = Conversation::where('hash', '=', $hash)->first();

            /* Now, let's find a user */
            $participant = Participant::where('conversation_id', $firstConversation->id)->where('user_id', '!=', Auth::user()->id)->first();
            $user = User::where('id', $participant->user_id)->first();

            /* Remove unread messages */
            Participant::where('conversation_id', $firstConversation->id)->where('user_id', '=', Auth::user()->id)->update(['unread' => 0]);
        }else{
            /* ToDo - Maybe change this to last chat or something like that */
            $firstConversation = $groups[0];
        }

        $conversation = Conversation::where('id', '=', $firstConversation->id)->first();
        $messages = Message::where('conversation_id', '=', $conversation->id)
            ->orderBy('id','desc')
            ->with('senderRel')
            ->take(20)
            ->get()
            ->reverse();


        $conversations = Conversation::whereHas('participantsRel', function ($q){
            $q->where('user_id', Auth::user()->id);
        })->where('is_group', 0)->orderBy('updated_at', 'DESC')->get();

        return view($this->_path . 'chat', [
            // 'teamMates' => Auth::user()->getUsersFromMyProgram(),
            'groups' => $groups,
            'firstConversation' => $conversation,
            'messages' => $messages,
            'user' => $user,
            'conversations' => $conversations
        ]);
    }
    public function createNewConversation($user_id): Conversation | bool{
        try{
            $user = User::where('id', $user_id)->first();

            $conversation = Conversation::create([
                'hash' =>  Hash::make(Auth::user()->id . '-' . $user_id . '-' . time()),
                'name' => Auth::user()->name . ' - ' . $user->name
            ]);
            Participant::create([
                'conversation_id' => $conversation->id,
                'user_id' => Auth::user()->id
            ]);
            Participant::create([
                'conversation_id' => $conversation->id,
                'user_id' => $user_id
            ]);

            return $conversation;
        }catch (\Exception $e){ return false; }
    }
    public function getConversation($user_id): Conversation | bool{
        try{
            $myConversations = Participant::where('user_id', Auth::user()->id)->get(['conversation_id']);
            if(!$myConversations->count()){
                /* None of them found; First conversation ever */
                $conversation = $this->createNewConversation($user_id);
            }else{
                $myConversations = $myConversations->toArray();
                $withUser = Participant::whereHas('conversationRel', function ($q) {
                    $q->where('is_group', false);
                })->whereIn('conversation_id', $myConversations)->where('user_id', $user_id)->first();

                if(!$withUser) $conversation = $this->createNewConversation($user_id);
                else $conversation = Conversation::where('id', '=', $withUser->conversation_id)->first();
            }

            return $conversation;
        }catch (\Exception $e){ return false; }
    }
    public function startConversation(Request $request): bool | string{
        try{
            if(isset($request->group)){
                /**
                 *  Group chat
                 */
                $conversation = Conversation::where('hash', '=', $request->hash)->first();

                return $this->jsonResponse('0000', __('Bilješka uspješno obrisana!'), [
                    'type' => 'group',
                    'title' => $conversation->name,
                    'image' => $conversation->image,
                    'hash' => $conversation->hash,
                    'messages' => Message::where('conversation_id', '=', $conversation->id)->with('senderRel')->orderBy('id', 'DESC')->take($this->_total_messages)->get()
                ]);
            }else{
                /**
                 *  Individual chat with other users
                 */

                $conversation = $this->getConversation($request->userId);

                if($conversation){
                    $participant = Participant::where('conversation_id', $conversation->id)->where('user_id', '!=', Auth::user()->id)->first();
                    $user = User::where('id', $participant->user_id)->first();

                    /* Set user photo */
                    $user->photo = $user->photoUri();

                    Participant::where('conversation_id', $conversation->id)->where('user_id', Auth::user()->id)->update(['unread' => 0]);

                    return $this->jsonResponse('0000', __('Bilješka uspješno obrisana!'), [
                        'type' => 'single',
                        'user' => $user,
                        'title' => $user->name,
                        'hash' => $conversation->hash,
                        'messages' => Message::where('conversation_id', '=', $conversation->id)->with('senderRel')->orderBy('id', 'DESC')->take($this->_total_messages)->get()
                    ]);
                }
            }
        }catch (\Exception $e){

        }
    }

    protected function sendNotifications(Conversation $conversation, User $user, $unread, $message): void{
        try{
            $notification = [
                'hash' => $conversation->hash,
                'conversation' => $conversation->name,
                'is_group' => $conversation->is_group,
                'unreadMessages' => $unread,
                'message' => $message
            ];

            $participants = Participant::where('conversation_id', $conversation->id)->where('user_id', '!=', Auth::user()->id)->get();

            foreach ($participants as $participant){
                try{
                    /** @var $otherUser: User that should receive push notification */
                    $otherUser = User::where('id', $participant->user_id)->first(['id', 'email', 'name', 'api_token', 'username','photo_uri']);
                    $notification['totalUnread'] = $otherUser->unreadMessages();

                    if($otherUser->api_token) $this->pushNotification($otherUser->api_token, $user, '2010', $notification);
                }catch (\Exception $e){}
            }
        }catch (\Exception $e){
            throw new $e;
        }
    }

    /**
     * @param Request $request
     * @return bool|string
     *
     * Create new message object and push notification to users
     */
    public function sendMessage(Request $request): bool | string{
        try{
            $user = User::where('id', Auth::user()->id)->first(['id', 'email', 'name', 'api_token', 'username','photo_uri']);
            $user->photo = $user->photoUri();

            /** @var CHAT_HASH $request */
            $conversation = Conversation::where('hash', $request->hash)->first();

            if($conversation->is_group == 0){
                /** @var $participant: Participant of message */
                $participant = Participant::where('conversation_id', $conversation->id)->where('user_id', '!=', Auth::user()->id)->first();
                $participant->update(['unread' => ($participant->unread + 1)]);
            }

            $message = Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => Auth::user()->id,
                'body' => $request->message
            ]);

            /** Publish over MQTT */
            $this->publishChatMessage($request->hash, $user, Message::where('id', $message->id)->with('senderRel')->first());

            try{
                /**
                 *  Create new push notification to other side/s
                 */
                 $this->sendNotifications($conversation, $user,isset($participant) ? $participant->unread : 0, $request->message );
            }catch (\Exception $e){
                // dump($e);
            }

            /** Update conversation so new conversations should show at the beginning */
            $conversation->update(['updated_at' => Carbon::now()]);

            /** Return response on sender message */
            return $this->jsonResponse('0000', __('Poruka poslana!'), [
                'user' => $user,
                'message' => Message::where('id', $message->id)->with('senderRel')->get()
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function fetchOldMessages(Request $request){
        try{
            $conversation = Conversation::where('hash', $request->hash)->first();

            return $this->jsonResponse('0000', __('Bilješka uspješno obrisana!'), [
                'messages' => Message::where('conversation_id', $conversation->id)
                    ->where('id', '<', $request->firstMessageID)
                    ->with('senderRel')
                    ->orderBy('id', 'DESC')
                    ->take($this->_total_messages)
                    ->get()
            ]);
        }catch (\Exception $e){
            dd($e);
        }
    }
}
