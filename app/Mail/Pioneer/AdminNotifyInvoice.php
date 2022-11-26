<?php

namespace App\Mail\Pioneer;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotifyInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin,$job,$invoice)
    {
     
        $this->admin = $admin;
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

         return $this->view('emails.pioneer.admin_notify_invoice')
                    ->subject('Invoice Notification') 
                     ->with([
                        'admin' => $this->admin,
                        'job' => $this->job,
                        'invoice' => $this->invoice
                    ]);
    }
}
