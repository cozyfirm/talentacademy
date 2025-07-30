<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\Chat\Participant;
use App\Models\User;
use App\Notifications\NewMessageNotification;
use App\Traits\Common\CommonTrait;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Mqtt\MqttTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatController extends Controller{
    use ResponseTrait, LogTrait, MqttTrait, CommonTrait;

    /* Number of messages */
    protected int $_msg_number = 10;

    protected array $_chat_info = [];

    /**
     * Fetch all conversations for logged user:
     *
     *  1. Group conversations
     *  2. Single conversations with another users
     *
     *  Explain: If is_group = 1, then for image use img_path + image; If is_group = 0, then for image
     *  use user_rel -> user_rel -> photo_path + photo uri;
     *  For name, is_group = 1 => name; For name is_group = 0 => user_rel -> user_rel -> name
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request): JsonResponse{
        try{
            /** First, let's collect all group chat that user is member */
            // $groupChats = Conversation::whereHas('participantsRel', function ($q) use($request){
            //    $q->where('user_id', $request->user_id);
            // })->where('is_group', 1)->orderBy('id')->get(['id', 'hash', 'name', 'description', 'image', 'participants', 'updated_at']);

            $chats = Conversation::whereHas('participantsRel', function ($q) use($request){
                $q->where('user_id', '=', $request->user_id);
            })
                ->with('userRel.userRel:id,name,username,photo_uri')
                ->with('userRel:conversation_id,user_id')
                ->with('mySide:conversation_id,user_id,unread')
                ->with('lastMessageRel.senderRel:id,name,username,photo_uri')
                ->with('lastMessageRel:id,conversation_id,sender_id,body,read')
                ->orderBy('updated_at', 'DESC')
                ->get(['id', 'hash', 'name', 'description', 'image', 'participants', 'is_group', 'updated_at']);

//            foreach ($chats as $chat){
//                if(!$chat->is_group) $chat->name = $chat->userRel->userRel->name ?? 'John Doe';
//                else{
//                    try{
//                        if (isset($chat->userRel) && isset($chat->userRel->userRel)) {
//                            $chat->userRel->userRel->setAttribute('photo_path', 'files/images/public-part/' . ($chat->image ?? ''));
//
//                            dd($chat->userRel->userRel);
//                        }
//                    }catch (\Exception $e){dd($e);}
//                }
//            }

            $chatArray = $chats->map(function ($chat) {
                $chatData = $chat->toArray();

                if (!$chat->is_group) {
                    $chatData['name'] = $chat->userRel->userRel->name ?? 'John Doe';
                } else {
                    // Ako postoji userRel.userRel — dodaj photo_path
                    if (isset($chatData['user_rel']['user_rel'])) {
                        $chatData['user_rel']['user_rel']['photo_path'] = 'files/images/public-part/' . ($chat->image ?? '');
                    }
                }

                return $chatData;
            })->values()->all();

            return $this->apiResponse('0000', __('Success'), [
                // 'group_chats' => [
                //    'img_path' => '/files/images/public-part/',
                //    'chats' => $groupChats->toArray()
                // ],
                'chats' => [
                    'img_path' => '/files/images/public-part/',
                    'data' => $chatArray
                ],
            ]);
        }catch (\Exception $e){
            $this->write('API: ChatController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5020', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Set conversation info
     *
     * @param Request $request
     * @return array
     */
    public function setConversationInfo(Request $request): array{
        $this->_chat_info = [];
        /* Display data for conversation */
        $conversation = Conversation::where('id', '=', $request->conversation_id)->first();

        $this->_chat_info['conversation_id'] = $request->conversation_id;
        $this->_chat_info['hash'] = $conversation->hash;

        if($conversation->is_group == 0){
            /* It's one to one */
            $this->_chat_info['name'] = $conversation->userRel->userRel->name ?? 'John Doe';
            $this->_chat_info['description'] = __('Privatni razgovor');
            $this->_chat_info['img_path'] = '/files/images/public-part/users/' . ($conversation->userRel->userRel->photo_uri ?? 'default.png');

            /* Update number of unread messages */
            Participant::where('conversation_id', $request->conversation_id)
                ->where('user_id', '=', $request->user_id)->update(['unread' => 0]);
        }else{
            /* Group chat */
            $this->_chat_info['name'] = $conversation->name;
            $this->_chat_info['description'] = $conversation->description;
            $this->_chat_info['img_path'] = '/files/images/public-part/' . $conversation->image;
        }

        return $this->_chat_info;
    }

    /**
     * Fetch messages from chat; Preview chat info
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function preview(Request $request): JsonResponse{
        try{
            if(!isset($request->conversation_id)) return $this->apiResponse('5026', __('Nepoznat razgovor'));
            if(isset($request->number)) $this->_msg_number = $request->number;

            try{
                /** Set messages as read */
                $participant = Participant::where('conversation_id', $request->conversation_id)->where('user_id', '=', $request->user_id)->first();
                $participant->update(['unread' => 0]);
            }catch (\Exception $e){}

            $messages = Message::where('conversation_id', '=', $request->conversation_id)
                ->orderBy('id','desc')
                ->with('senderRel:id,name,username,photo_uri')
                ->select('id', 'conversation_id', 'sender_id', 'body', 'read');
            $messages = Filters::filter($messages, $this->_msg_number);

            return $this->apiResponse('0000', __('Success'), [
                'chat' => $this->setConversationInfo($request),
                'messages' => $messages->toArray()
            ]);
        }catch (\Exception $e){
            $this->write('API: ChatController::preview()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5025', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Send message to user
     * @param Request $request
     * @return JsonResponse
     */
    public function sendMessage(Request $request): JsonResponse{
        try{
            /** Log request */
            $this->write('API: ChatController::sendMessage()', "5028", "Request data", $request);

            if(!isset($request->conversation_id)) return $this->apiResponse('5029', __('Nepoznat razgovor'));
            if(!isset($request->message)) return $this->apiResponse('5029', __('Poruka ne može biti prazna'));

            /** Add new messages */
            $message = Message::create([
                'conversation_id' => $request->conversation_id,
                'sender_id' => $request->user_id,
                'body' => $request->message
            ]);

            try{
                Conversation::where('id', '=', $request->conversation_id)->update(['updated_at' => date('Y-m-d H:i:s')]);
            }catch (\Exception $e){
                $this->write('API: ChatController::fetch() - Update updated at', $e->getCode(), $e->getMessage(), $request);
            }

            /** Get conversation info */
            $conversationInfo = $this->setConversationInfo($request);

            try{
                /** Broadcast over MQTT */
                $user = User::where('id', '=', $request->user_id)->first(['id', 'email', 'name', 'api_token', 'username','photo_uri']);
                $user->photo = $user->photoUri();

                $this->publishChatMessage($conversationInfo['hash'], $user, Message::where('id', '=', $message->id)->with('senderRel')->first());
            }catch (\Exception $e){
                $this->write('API: ChatController::fetch() - Broadcast over socket', $e->getCode(), $e->getMessage(), $request);
            }

            $this->write('Chat::sendMessage()', "5029", json_encode($message), $request);
            /**
             *  Create new notification and new push notification
             */
            try{
                /** @var $participants; Get participant object to extract receiver ID */
                $participants  = Participant::where('conversation_id', $request->conversation_id)->where('user_id', '!=', $request->user_id)->get();

                foreach ($participants as $participant) {
                    try{
                        /** @var $receiver; Get user object */
                        $receiver = User::findOrFail($participant->user_id);

                        try{
                            /** Update number of unread messages */
                            $participant->update(['unread' => ($participant->unread + 1)]);
                        }catch (\Exception $e){}

                        /** Send message only if receiver is offline */
                        if ($receiver->isOffline()) {}

                        /** @var $message; Format message */
                        $message = (object)[
                            'id' => $message->id,
                            'content' => $request->message,
                            'sender' => auth()->user(),
                            'chat' => $conversationInfo
                        ];

                        // $this->write('API: ChatController::fetch() - Sending message to', $receiver->id, json_encode($message), $request);

                        /** Send message and create database sample */
                        $receiver->notify(new NewMessageNotification($message));

                        $this->write('Chat::sendMessage()', "5030", json_encode($message), $request);
                    }catch (\Exception $e){}
                }
            }catch (\Exception $e){
                $this->write('API: ChatController::sendMessage() - Create notification', $e->getCode(), $e->getMessage(), $request);
            }

            $messages = Message::where('conversation_id', '=', $request->conversation_id)
                ->orderBy('id','desc')
                ->with('senderRel:id,name,username,photo_uri')
                ->select('id', 'conversation_id', 'sender_id', 'body', 'read');
            $messages = Filters::filter($messages, $this->_msg_number);

            return $this->apiResponse('0000', __('Success'), [
                'chat' => $conversationInfo,
                'messages' => $messages->toArray()
            ]);
        }catch (\Exception $e){
            $this->write('API: ChatController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5028', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    /**
     * Create new conversation between two users
     *
     * @param $user_id
     * @param $another_user_id
     * @return Conversation|bool
     */
    public function createNewConversation($user_id, $another_user_id): Conversation | bool{
        try{
            $anotherUser = User::where('id', '=', $another_user_id)->first();
            $user = User::where('id', '=', $user_id)->first();

            $conversation = Conversation::create([
                'hash' => $this->getCustomHash($another_user_id . '-' . $user_id . '-' . time()),
                'name' => $anotherUser->name . ' - ' . $user->name
            ]);
            Participant::create([
                'conversation_id' => $conversation->id,
                'user_id' => $another_user_id
            ]);
            Participant::create([
                'conversation_id' => $conversation->id,
                'user_id' => $user_id
            ]);

            return $conversation;
        }catch (\Exception $e){ return false; }
    }

    /**
     * Get or create chat
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getOrCreate(Request $request): JsonResponse{
        try{
            if(!isset($request->other_user_id)) return $this->apiResponse('5029', __('Nepoznat korisnik'));

            /* First, let's check if there is a conversation between users */
            $conversation = Conversation::where('is_group', '=', 0)
                ->whereHas('participantsRel', function ($q) use ($request) {
                    $q->where('user_id', $request->user_id);
                })
                ->whereHas('participantsRel', function ($q) use ($request) {
                    $q->where('user_id', $request->other_user_id);
                })
                ->whereHas('participantsRel', function ($q) {
                    $q->select('conversation_id')
                        ->groupBy('conversation_id')
                        ->havingRaw('COUNT(*) = 2'); // samo 2 učesnika
                })
                ->first();

            if(!$conversation){
                $conversation = $this->createNewConversation($request->user_id, $request->other_user_id);
            }else{
                try{
                    /** Set messages as read */
                    $participant = Participant::where('conversation_id', $conversation->id)->where('user_id', '=', $request->user_id)->first();
                    $participant->update(['unread' => 0]);
                }catch (\Exception $e){
                    $this->write('API: ChatController::getOrCreate() - Update unread', $e->getCode(), $e->getMessage(), $request);
                }
            }

            $request['conversation_id'] = $conversation->id ?? 0;

            $messages = Message::where('conversation_id', '=', $conversation->id)
                ->orderBy('id','desc')
                ->with('senderRel:id,name,username,photo_uri')
                ->select('id', 'conversation_id', 'sender_id', 'body', 'read');
            $messages = Filters::filter($messages, $this->_msg_number);

            return $this->apiResponse('0000', __('Success'), [
                'chat' => $this->setConversationInfo($request),
                'messages' => $messages->toArray()
            ]);
        }catch (\Exception $e){
            $this->write('API: ChatController::getOrCreate()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5025', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
