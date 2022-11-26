<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DestinationEscrowReceivedNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$job,$escrow)
    {
     
        $this->user = $user;
        $this->job = $job;
        $this->escrow = $escrow;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         return $this->view('emails.admin.destination_escrow_received_notify')
                    ->subject('Escrow Received') 
                     ->with([
                        'user' => $this->user,
                        'job' => $this->job,
                        'escrow'=> $this->escrow
                    ]);
    }
}
