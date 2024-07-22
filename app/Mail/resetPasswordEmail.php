<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class resetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private $mail, public $url)
    {
        //
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $APP_NAME = "SabanWi";
        $email = $this->mail;
        $url = $this->url;
        $time = date_create()->format('Y-m-d H:i'); 
        return $this->view('mail.resetPassword',compact('APP_NAME','email','url','time'));
    }
}