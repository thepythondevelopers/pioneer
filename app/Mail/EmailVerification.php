<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token,$first_name,$last_name)
    {
        $this->token = $token;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         return $this->view('emails.email_verification')
                    ->subject('Pioneering People Account Verification') 
                     ->with([
                        'token' => $this->token,
                        'first_name' => $this->first_name,
                        'last_name' => $this->last_name
                    ]);
    }
}
