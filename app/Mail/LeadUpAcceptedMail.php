<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class LeadUpAcceptedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Application $application
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'RAPP LEAD-UP Programme Acceptance',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.lead-up-accepted',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
