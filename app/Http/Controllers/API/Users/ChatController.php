<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\Other\Inbox\InboxTo;
use App\Traits\Common\LogTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller{
    use ResponseTrait, LogTrait;

    /* Number of messages */
    protected int $_msg_number = 10;

    /**
     * Fetch all conversations for logged user:
     *
     *  1. Group conversations
     *  2. Single conversations with another users
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function fetch(Request $request): JsonResponse{
        try{
            /** First, let's collect all group chat that user is member */
            $groupChats = Conversation::whereHas('participantsRel', function ($q) use($request){
                $q->where('user_id', $request->user_id);
            })->where('is_group', 1)->orderBy('id')->get(['id', 'hash', 'name', 'description', 'image', 'participants', 'updated_at']);

            $chats = Conversation::whereHas('participantsRel', function ($q) use($request){
                $q->where('user_id', '=', $request->user_id);
            })->where('is_group', 0)
                ->with('userRel.userRel:id,name,username,photo_uri')
                ->with('userRel:conversation_id,user_id')
                ->with('mySide:conversation_id,user_id,unread')
                ->orderBy('updated_at', 'DESC')
                ->get(['id', 'hash', 'updated_at']);

            return $this->apiResponse('0000', __('Success'), [
                'group_chats' => [
                    'img_path' => '/files/images/public-part/',
                    'chats' => $groupChats->toArray()
                ],
                'chats' => $chats->toArray()
            ]);
        }catch (\Exception $e){
            $this->write('API: ChatController::fetch()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5020', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }

    public function preview(Request $request): JsonResponse{
        try{
            if(!isset($request->conversation_id)) return $this->apiResponse('5026', __('Nepoznat razgovor'));
            if(isset($request->number)) $this->_msg_number = $request->number;

            $messages = Message::where('conversation_id', '=', $request->conversation_id)
                ->orderBy('id','desc')
                ->with('senderRel:id,name,username,photo_uri')
                ->select('id', 'conversation_id', 'sender_id', 'body', 'read');
            $messages = Filters::filter($messages, $this->_msg_number);

            return $this->apiResponse('0000', __('Success'), [
                'chat' => [],
                'messages' => $messages->toArray()
            ]);
        }catch (\Exception $e){
            $this->write('API: ChatController::preview()', $e->getCode(), $e->getMessage(), $request);
            return $this->apiResponse('5025', __('Desila se greška. Molimo da kontaktirate administratore'));
        }
    }
}
