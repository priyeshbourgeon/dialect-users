<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\LimittedEnquiryMail;
use Mail;
use App\Models\Company;

class LimittedEnquiryMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    protected $mail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$mail)
    {
        $this->user = $user;
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $details['subject'] = $this->mail->subject;
        $email = new LimittedEnquiryMail($details);
        Mail::to($this->user)->send($email);
    }
}
