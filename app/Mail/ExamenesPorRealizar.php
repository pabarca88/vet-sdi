<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExamenesPorRealizar extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $paciente;
    public $examenes;

    public function __construct($paciente, $examenes)
    {
        $this->paciente = $paciente;
        $this->examenes = $examenes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Exámenes por realizar')
            ->view('emails.otros.examenes_por_realizar');
    }
}
