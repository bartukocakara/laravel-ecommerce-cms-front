<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMessageAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $details, $types;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $types)
    {
        $this->details = $details;
        $this->types = $types;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mona Tasarım - Yeni Mesajınız Var')
        ->view('mails.new-message-customer');
    }
}
