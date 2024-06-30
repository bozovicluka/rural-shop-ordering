<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderDeliveryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $comment)
    {
        $this->order = $order;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('Narudžbina')
            ->view('mails.order-delivery')
            ->with([
                'order' => $this->order,
                'comment' => $this->comment,
            ]);
    }
}
