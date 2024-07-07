<?php

namespace App\Http\Controllers\System\Admin\Other\Chat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Chat\Conversation;
use App\Models\Chat\Message;
use App\Models\Chat\Participant;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use App\Traits\Users\UserBaseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class GroupChatsController extends Controller{
    use UserBaseTrait, ResponseTrait;
    protected string $_path = 'admin.other.chat.group-chats.';

    public function index (): View{
        $conversations = Conversation::where('is_group', '=', true);
        $conversations = Filters::filter($conversations);

        $filters = [
            'name' => __('Naziv grupe'),
            'participants' => __('Broj članova')
        ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'conversations' => $conversations
        ]);
    }

    public function create (): View{
        return view($this->_path . 'create', [
            'create' => true
        ]);
    }
    public function save(Request $request): JsonResponse{
        try{
            $conversation = Conversation::create([
                'name' => $request->name,
                'description' => $request->description,
                'hash' => Hash::make(Auth::user()->id . '-' . date('y-m-d-h-i') . '-' . time()),
                'participants' => 0,
                'is_group' => true
            ]);

            return $this->jsonSuccess(__('Uspješno ste unijeli lokaciju!'), route('system.admin.chat.group-chats.preview', ['id' => $conversation->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function preview ($id): View | RedirectResponse{
        $conversation = Conversation::where('id', '=', $id)->first();
        if(!$conversation->is_group) return redirect()->route('system.admin.chat.group-chats');
        return view($this->_path . 'create', [
            'preview' => true,
            'conversation' => $conversation
        ]);
    }
    public function delete ($id): RedirectResponse{
        try{
            Participant::where('conversation_id', $id)->delete();
            Message::where('conversation_id', '=', $id)->delete();
            Conversation::where('id', '=', $id)->delete();

            return redirect()->route('system.admin.chat.group-chats');
        }catch (\Exception $e){ return back(); }
    }

    /**
     *  Participants
     */
    public function addParticipant ($id): View | RedirectResponse{
        $conversation = Conversation::where('id', '=', $id)->first();
        if(!$conversation->is_group) return redirect()->route('system.admin.chat.group-chats');

        return view($this->_path . 'add-participant', [
            'create' => true,
            'conversation' => $conversation,
            'users' => User::orderBy('name', 'ASC')->get()->pluck('name', 'id')
        ]);
    }
    public function saveParticipant(Request $request): JsonResponse{
        try{
            $conversation = Conversation::where('id', $request->id)->first();
            $participant = Participant::where('conversation_id', '=', $conversation->id)->where('user_id', $request->user_id)->first();

            if(!$participant){
                Participant::create([
                    'conversation_id' => $conversation->id,
                    'user_id' => $request->user_id
                ]);
            }

            $conversation->update(['participants' => Participant::where('conversation_id', $conversation->id)->count()]);

            return $this->jsonSuccess(__('Uspješno ste unijeli lokaciju!'), route('system.admin.chat.group-chats.preview', ['id' => $conversation->id]));
        }catch (\Exception $e){
            return $this->jsonError('1500', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function deleteParticipant ($id): RedirectResponse{
        try{
            $participant = Participant::where('id', $id)->first();
            $conversation = Conversation::where('id', '=', $participant->conversation_id)->first();

            $participant->delete();

            $conversation->update(['participants' => Participant::where('conversation_id', $conversation->id)->count()]);

            return redirect()->route('system.admin.chat.group-chats.preview', ['id' => $conversation->id]);
        }catch (\Exception $e){return back();}
    }
}
