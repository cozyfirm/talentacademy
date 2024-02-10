<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmEmail extends Mailable{
    use Queueable, SerializesModels;
    public $_email, $_name;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $name){
        $this->_email = $email;
        $this->_name = $name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope{
        return new Envelope(
            from: new Address('no-reply@fondacijaekipa.ba', 'NoReply EKIPA'),
            subject: 'Confirm Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content{
        return new Content(
            markdown: 'public-part.auth.mail.confirm-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array{
        return [];
    }
}
