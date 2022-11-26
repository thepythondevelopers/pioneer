<?php

namespace App\Mail\Pioneer;

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

         return $this->view('emails.pioneer.admin_notify_signup')
                    ->subject('Pioneer Signup') 
                     ->with([
                        'admin' => $this->admin,
                        'user' => $this->user
                    ]);
    }
}
