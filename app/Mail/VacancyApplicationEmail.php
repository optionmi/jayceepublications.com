<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VacancyApplicationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $job_position;
    public $cover_letter;
    public $cv_file_url;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $phone, $job_position, $cover_letter, $cv_file_url)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->job_position = $job_position;
        $this->cover_letter = $cover_letter;
        $this->cv_file_url = $cv_file_url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Vacancy Application Email from ' . $this->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'web.VacancyApplicationEmail',
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
