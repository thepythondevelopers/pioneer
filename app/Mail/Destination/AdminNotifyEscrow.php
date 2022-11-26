<?php

namespace App\Mail\Destination;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotifyEscrow extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin,$escrow)
    {
     
        $this->admin = $admin;
        $this->escrow = $escrow;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         return $this->view('emails.destination.admin_notify_escrow')
                    ->subject('Escrow Notification') 
                     ->with([
                        'admin' => $this->admin,
                        'escrow' => $this->escrow
                    ]);
    }
}
