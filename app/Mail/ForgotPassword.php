<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $link;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link, $user)
    {
        $this->link = $link;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->user;
        $link = $this->link;
        return $this->markdown('emails.forgot_password', compact('data', 'link'));
    }
}
