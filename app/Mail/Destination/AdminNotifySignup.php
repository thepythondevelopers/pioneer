<?php

namespace App\Mail\Destination;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotifySignup extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin,$user)
    {
     
        $this->admin = $admin;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         return $this->view('emails.destination.admin_notify_signup')
                    ->subject('Destination Signup') 
                     ->with([
                        'admin' => $this->admin,
                        'user' => $this->user
                    ]);
    }
}
