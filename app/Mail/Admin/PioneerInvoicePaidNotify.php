<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PioneerInvoicePaidNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$job,$invoice)
    {
     
        $this->user = $user;
        $this->job = $job;
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         return $this->view('emails.admin.pioneer_invoice_paid_notify')
                    ->subject('Invoice Paid') 
                     ->with([
                        'user' => $this->user,
                        'job' => $this->job,
                        'invoice'=> $this->invoice
                    ]);
    }
}
