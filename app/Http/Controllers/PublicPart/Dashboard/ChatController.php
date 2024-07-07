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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ChatController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait, CommonTrait, MqttTrait;
    protected string $_path = 'public-part.dashboard.chat.';
    protected int $_total_messages = 20;

    public function chat(): View{
        $totalConversations = Participant::where('user_id', Auth::user()->id)->count();
        if(!$totalConversations){
            /* Get first teammate */
//            dd(Auth::user()->getMyTeamMates());
            // $conversation = $this->getConversation($request->userId);
        }else{

        }
//        dd($totalConversations);
        return view($this->_path . 'chat', [
            'teamMates' => Auth::user()->getMyTeamMates()
        ]);
    }
    public function createNewConversation($user_id): Conversation | bool{
        try{
            $conversation = Conversation::create([
                'hash' =>  Hash::make(Auth::user()->id . '-' . $user_id . '-' . time())
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
                $withUser = Participant::whereIn('conversation_id', $myConversations)->where('user_id', $user_id)->first();

                if(!$withUser) $conversation = $this->createNewConversation($user_id);
                else $conversation = Conversation::where('id', $withUser->conversation_id)->first();
            }

            return $conversation;
        }catch (\Exception $e){ return false; }
    }
    public function startConversation(Request $request): bool | string{
        try{
            $conversation = $this->getConversation($request->userId);

            if($conversation){
                /* Find user for conversation or conversation name */
                if($conversation->participants > 2){

                }else{
                    $participant = Participant::where('conversation_id', $conversation->id)->where('user_id', '!=', Auth::user()->id)->first();
                    $user = User::where('id', $participant->user_id)->first();

                    /* Set user photo */
                    $user->photo = $user->photoUri();

                    return $this->jsonResponse('0000', __('Bilješka uspješno obrisana!'), [
                        'type' => 'single',
                        'user' => $user,
                        'title' => $user->name,
                        'hash' => $conversation->hash,
                        'messages' => Message::where('conversation_id', $conversation->id)->with('senderRel')->orderBy('id', 'DESC')->take($this->_total_messages)->get()
                    ]);
                }
            }
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function sendMessage(Request $request): bool | string{
        try{
            $user = User::where('id', Auth::user()->id)->first();
            $user->photo = $user->photoUri();

            /** @var CHAT_HASH $request */
            $conversation = Conversation::where('hash', $request->hash)->first();

            $message = Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => Auth::user()->id,
                'body' => $request->message
            ]);

            /* Publish over MQTT */
            $this->publishChatMessage($request->hash, $user, Message::where('id', $message->id)->with('senderRel')->first());

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
