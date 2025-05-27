<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InscriptionCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $userinfo;
    public $datainscription;

    public function __construct($data)
    {
        $this->userinfo = $data['user'];
        $this->datainscription = $data['datainscription'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.inscription_created')
        ->subject('PRE INSCRIPCION # '.$this->datainscription->id.': '.$this->userinfo->name.' '.$this->userinfo->lastname.' ('.$this->userinfo->country.')');
    }
}
