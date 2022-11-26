<?php

namespace App\Mail\Pioneer;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProposalSubmit extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$job)
    {
     
        $this->user = $user;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         return $this->view('emails.pioneer.proposal_submit')
                    ->subject('Proposal Submit') 
                     ->with([
                        'user' => $this->user,
                        'job' => $this->job
                    ]);
    }
}
