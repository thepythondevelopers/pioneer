<?php

namespace App\Mail\Destination;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PioneerHireJob extends Mailable
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

         return $this->view('emails.destination.pioneer_hire_job')
                    ->subject('Hire For Job') 
                     ->with([
                        'user' => $this->user,
                        'job' => $this->job
                    ]);
    }
}
