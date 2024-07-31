<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class maintenancePlan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(protected $listMachineWarning, protected $nameUser)
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
        // return $this->markdown('emails.maintenace_email',['listMachineWarning'=>$this->listMachineWarning]);
        return $this->view('mail.maintenace',['listMachineWarning'=>$this->listMachineWarning, 'name'=>$this->nameUser]);
    }
}