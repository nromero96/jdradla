<?php

namespace App\Mail;

use App\Models\Inscription;
use App\Models\Program;
use App\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

//log
use Illuminate\Support\Facades\Log;

class IndividualExhibitorProgramMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inscription;
    public $user;
    public $programs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inscription, $user)
    {
        $this->user = $user;
        $this->inscription = $inscription;

        // Obtener los programas relacionados con esta inscripción
        $this->programs = Program::where('insc_id', $inscription->id)->get();

        //log $this->programs
        Log::info($this->programs);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = $this->user->name . ' ' . $this->user->lastname . ' (' . $this->user->country . '): SU AGENDA PERSONALIZADA EN RADLA LIMA 2024.';
        return $this->view('emails.individual_exhibitor_program')
        ->subject($subject)
        ->attach('https://radla2024.org/wp-content/uploads/2024/04/version-final-Programa-General-RADLA-2024-publicacion-220424.pdf', [
            'as' => 'Programa-General-RADLA-2024-010424.pdf',
            'mime' => 'application/pdf',
        ]);
    
    }
}
