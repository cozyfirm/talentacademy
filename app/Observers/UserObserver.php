<?php

namespace App\Observers;

use App\Mail\Users\ConfirmEmail;
use App\Models\Other\Inbox\InboxTo;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserObserver{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user): void {
        $message = "Email to " . ($user->name);
        try{
            Mail::to($user->email)->send(new ConfirmEmail($user->email, $user->name, $user->api_token));

            $message .= " is successfully sent!";
        }catch (\Exception $e){
            $message .= " was not sent! Error: " . $e->getMessage();
        }

        try{
            /* Create welcome message */
            InboxTo::create([
                'inbox_id' => 1,
                'to' => $user->id
            ]);
        }catch (\Exception $e){}
        Log::info($message);
    }
}
