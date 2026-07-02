<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We have received your inquiry - AI-Solutions',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_thanks',
            with: [
                'name' => $this->data['first_name'] . ' ' . $this->data['last_name'],
                'type' => $this->data['type'],
                'msg' => $this->data['message'],
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
