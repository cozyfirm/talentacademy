<?php

namespace App\Http\Controllers\PublicPart\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Chat\Conversation;
use App\Models\Chat\Participant;
use App\Models\User;
use App\Traits\Common\CommonTrait;
use App\Traits\Common\FileTrait;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ChatController extends Controller{
    use UserBaseTrait, ResponseTrait, FileTrait, CommonTrait;
    protected string $_path = 'public-part.dashboard.chat.';

    public function chat(): View{
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
                        'hash' => $conversation->hash
                    ]);
                }
            }
        }catch (\Exception $e){
            dd($e);
        }
    }
    public function sendMessage(Request $request): bool | string{
        try{
            dd($request->all());
        }catch (\Exception $e){
            dd($e);
        }
    }
}
