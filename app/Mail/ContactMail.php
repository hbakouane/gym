<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public string $EmailSubject;
    public string $EmailMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->EmailSubject = $data['subject'];
        $this->EmailMessage = $data['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
                    ->subject('New Contact Email')
                    ->view('mails.contact')
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'EmailSubject' => $this->EmailSubject,
                        'message' => $this->EmailMessage,
                    ]);
    }
}
