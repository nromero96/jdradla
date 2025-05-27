<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfFilePath;
    public $fullName;
    public $country;

    public function __construct($pdfFilePath, $fullName, $country)
    {
        $this->pdfFilePath = $pdfFilePath;
        $this->fullName = $fullName;
        $this->country = $country;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invitation')
            ->subject('Invitacion QR 2025 - '.$this->fullName.' - '.$this->country.'')
            ->attach($this->pdfFilePath, [
                'as' => 'Invitacion QR 2025 - '.$this->fullName.' - '.$this->country.'.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
