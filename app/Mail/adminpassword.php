<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class adminpassword extends Mailable
{
    use Queueable, SerializesModels;
    public $reply;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reply)
    {
       $this->reply=$reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->subject('Reply Form Tablige Quran')
                    ->view('email/sendpassword')->with('admindata', $this->reply);
    }
}
