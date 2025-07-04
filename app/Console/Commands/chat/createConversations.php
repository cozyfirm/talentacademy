<?php

namespace App\Console\Commands\chat;

use App\Models\Chat\Conversation;
use App\Models\Chat\Participant;
use App\Models\User;
use App\Traits\Common\CommonTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class createConversations extends Command{
    use CommonTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-conversations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function createNewConversation($base_user_id, $user_id): Conversation | bool{
        try{
            $baseUser = User::where('id', '=', $base_user_id)->first();
            $user = User::where('id', '=', $user_id)->first();

            $conversation = Conversation::create([
                'hash' => $this->getCustomHash($base_user_id . '-' . $user_id . '-' . time()),
                'name' => $baseUser->name . ' - ' . $user->name
            ]);
            Participant::create([
                'conversation_id' => $conversation->id,
                'user_id' => $base_user_id
            ]);
            Participant::create([
                'conversation_id' => $conversation->id,
                'user_id' => $user_id
            ]);

            return $conversation;
        }catch (\Exception $e){ return false; }
    }

    public function handle(){
        $conversations = Conversation::get();
        foreach ($conversations as $conversation){
            $hash = str_replace('/', '-', $conversation->hash);
            $hash = str_replace('&', '-', $hash);

            if (str_contains($conversation->hash, '/')){
                $conversation->update(['hash' => $hash]);
            }
        }

        for($i=6; $i<=10; $i++){
            $usersFromProgram = User::whereHas('applicationRel', function ($q) use ($i){
                $q->where('app_status', '=', 'accepted')
                    ->whereHas('programRel', function ($q) use($i){
                        $q->where('id', '=', $i);
                    });
            })->orWhereHas('sessionsRel.sessionRel', function ($q) use ($i){
                $q->where('program_id', $i);
            })->orderBy('name')->get();


            foreach ($usersFromProgram as $userFromProgram){
                if($userFromProgram->role == 'user'){
                    $usersByUser = User::whereHas('applicationRel', function ($q) use ($i){
                        $q->where('app_status', '=', 'accepted')
                            ->whereHas('programRel', function ($q) use($i){
                                $q->where('id', '=', $i);
                            });
                    })->orWhereHas('sessionsRel.sessionRel', function ($q) use ($i){
                        $q->where('program_id', $i);
                    })->orderBy('name')->get();
                }else{
                    $usersByUser = User::whereHas('applicationRel', function ($q) use ($i){
                        $q->where('app_status', '=', 'accepted')
                            ->whereHas('programRel', function ($q) use($i){
                                $q->where('id', '=', $i);
                            });
                    })->orWhereHas('sessionsRel.sessionRel', function ($q) use ($i){
                        $q->where('program_id', $i);
                    })->orderBy('name')->get();
                }

                foreach ($usersByUser as $userByUser){
                    if($userFromProgram->id != $userByUser->id){

                        $myConversations = Participant::where('user_id', $userFromProgram->id)->get(['conversation_id']);
                        if(!$myConversations->count()){
                            /* None of them found; First conversation ever */
                            $conversation = $this->createNewConversation($userFromProgram->id, $userByUser->id);
                        }else{
                            $myConversations = $myConversations->toArray();
                            $withUser = Participant::whereHas('conversationRel', function ($q) {
                                $q->where('is_group', false);
                            })->whereIn('conversation_id', $myConversations)->where('user_id', $userByUser->id)->first();

                            if(!$withUser) $conversation = $this->createNewConversation($userFromProgram->id, $userByUser->id);
                            else $conversation = Conversation::where('id', '=', $withUser->conversation_id)->first();
                        }
                    }
                }
            }
        }
    }
}
