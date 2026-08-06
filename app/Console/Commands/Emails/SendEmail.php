<?php

namespace App\Console\Commands\Emails;

use App\Mail\Users\ApplicationStatus;
use App\Mail\Users\NotifyAttendees;
use App\Models\Programs\ProgramApplication;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('role', '=','user')
            ->where('id', '>', 470)
            ->where('created_at', '<', '2026-07-01')
            ->get();

        $counter = 0;
        foreach ($users as $user){
            $accepted = ProgramApplication::where('attendee_id', '=', $user->id)->where('app_status', '=', 'accepted')->count();

            if(!$accepted){
                try{
                    // Send an email

                    Mail::to($user->email)->send(new NotifyAttendees());
                    // Mail::to('kaapiic@gmail.com')->send(new NotifyAttendees());
                    sleep(5);
                    dump(Carbon::now()->format('H:i:s') . " [SENT] Email sent to: (" . $user->id . ") " . $user->email);

                    $message = Carbon::now()->format('H:i:s')
                        . " [SENT] Email sent to: ({$user->id}) {$user->email}";

                    file_put_contents(
                        storage_path('logs/email-sending.log'),
                        $message . PHP_EOL,
                        FILE_APPEND | LOCK_EX
                    );

                }catch (\Exception $e){
                    $message = Carbon::now()->format('H:i:s')
                        . " [ERROR] Error while sending email to: ({$user->id}) {$user->email}"
                        . " | " . $e->getMessage();

                    dump($message);

                    file_put_contents(
                        storage_path('logs/email-sending.log'),
                        $message . PHP_EOL,
                        FILE_APPEND | LOCK_EX
                    );
                }
            }
        }
    }
}
