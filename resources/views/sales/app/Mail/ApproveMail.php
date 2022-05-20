<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Company;

class ApproveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $users;
    public function __construct($users)
    {
        $this->users = $users;
    }
   
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $company = Company::first();
        return $this->subject('Mail from DialectB2B')
                    ->view('emails.user-onboarding');
    }
    
}