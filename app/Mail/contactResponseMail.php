<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title, $body, $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $title, $body)
    {
        //
        $this->name  = $name;
        $this->title = $title;
        $this->body  = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('cp.Mails.contactUs-response')
            ->subject("رسالة من أكاديمية رؤية - $this->title");
    }
}
