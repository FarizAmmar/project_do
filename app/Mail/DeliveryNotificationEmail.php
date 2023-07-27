<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DeliveryNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $deliveryData;

    /**
     * Create a new message instance.
     */
    public function __construct($deliveryData)
    {
        $this->deliveryData = $deliveryData;
    }

    public function build()
    {
        return $this->view('emails.delivery_notification')
            ->subject('Notification for Delivery')
            ->with('deliveryData', $this->deliveryData);
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
