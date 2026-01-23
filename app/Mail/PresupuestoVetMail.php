<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PresupuestoVetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ficha;
    public $profesional;
    public $paciente;
    protected $pdfContent;

    public function __construct($ficha, $profesional, $paciente, $pdfContent)
    {
        $this->ficha = $ficha;
        $this->profesional = $profesional;
        $this->paciente = $paciente;
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        return $this->subject('Presupuesto veterinario')
            ->markdown('emails.presupuesto.vet')
            ->attachData($this->pdfContent, 'presupuesto_veterinario.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
