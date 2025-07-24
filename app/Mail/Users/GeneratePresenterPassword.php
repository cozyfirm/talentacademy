<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GeneratePresenterPassword extends Mailable
{
    use Queueable, SerializesModels;
    public string $_name, $_email, $_password;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $password){
        $this->_name = $name;
        $this->_email = $email;
        $this->_password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope{
        return new Envelope(
            from: new Address('no-reply@fondacijaekipa.ba', 'NoReply EKIPA'),
            subject: 'Pristup TMS sistemu Akademije',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'admin.users.emails.generate-presenter-password',
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
