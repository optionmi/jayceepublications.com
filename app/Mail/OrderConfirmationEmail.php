<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $books;
    public $data;
    public $totalPrice;
    public $totalDiscount;
    public $totalAmountReceivable;
    public $totalQuantity;
    public $totalFinalPrice;

    /**
     * Create a new message instance.
     */
    public function __construct($books, $data, $totalPrice, $totalDiscount, $totalAmountReceivable, $totalQuantity, $totalFinalPrice)
    {
        $this->books = $books;
        $this->data = $data;
        $this->totalPrice = $totalPrice;
        $this->totalDiscount = $totalDiscount;
        $this->totalAmountReceivable = $totalAmountReceivable;
        $this->totalQuantity = $totalQuantity;
        $this->totalFinalPrice = $totalFinalPrice;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Order Confirmation Email by ' . auth()->user()->name,
            from: 'info@jayceepublications.com',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'web.OrderConfirmationEmail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
