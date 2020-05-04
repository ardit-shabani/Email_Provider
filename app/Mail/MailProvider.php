<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailProvider extends Mailable
{
    use Queueable, SerializesModels;


    public $content;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($to,$subject,$content)
    {
        $this->to($to);
        $this->from('noreply@cacttus.com');
        $this->subject($subject);
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.email_template')->with('content',$this->content);
    }
}
