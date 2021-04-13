<?php

namespace App\Http\Livewire\External;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class Contact extends Component
{
    public $class = '';
    public $text = 'text-dark';

    public $name;
    public $email;
    public $subject;
    public $message;

    public $sent = false;

    public $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ];

    public function render()
    {
        return view('livewire.external.contact');
    }

    public function sendEmail() {
        $this->validate($this->rules);
        Mail::to(env('EMAIL'))->send(new ContactMail([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]));
        $this->sent = true;
        $this->reset(['name', 'email', 'subject', 'message']);
    }
}
