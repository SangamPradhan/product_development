<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingData;
    public $eventData;

    public function __construct($bookingData, $eventData)
    {
        $this->bookingData = $bookingData;
        $this->eventData = $eventData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event Booking Confirmed: ' . $this->eventData['title'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.event_booking',
            with: [
                'name' => $this->bookingData['name'],
                'eventTitle' => $this->eventData['title'],
                'eventDate' => $this->eventData['event_date'],
                'location' => $this->eventData['location'],
                'seats' => $this->bookingData['seats'],
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
