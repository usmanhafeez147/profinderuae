<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\EmailVerification;

class SendVerificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailVerification($this->user);
        
         $data=array(
            'email'=>$this->user->email,
            'email_token'=>$this->user->email_token,
            'subject'=>"Subsciption Successfully",
            'bodyMessage'=>""
            );

        Mail::send('emails.email',$data,function($message) use ($data){
            $message->from('profinderuae@profinderuae.com');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });

       // Mail::to($this->user->email)->from('profinderuae@profinderuae.com')->send($email);
    }
}
