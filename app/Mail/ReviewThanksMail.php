<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewThanksMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reviewData;
    public $projectTitle;

    /**
     * Create a new message instance.
     */
    public function __construct($reviewData, $projectTitle)
    {
        $this->reviewData = $reviewData;
        $this->projectTitle = $projectTitle;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for your review: ' . $this->projectTitle,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.review_thanks',
            with: [
                'name' => $this->reviewData['reviewer_name'],
                'projectTitle' => $this->projectTitle,
                'comment' => $this->reviewData['comment'],
                'rating' => $this->reviewData['rating'],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
