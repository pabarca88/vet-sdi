<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PresupuestoInsumosMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ficha;
    public $profesional;
    public $insumos;

    public function __construct($ficha, $profesional, $insumos, $pdfContent)
    {
        $this->ficha = $ficha;
        $this->profesional = $profesional;
        $this->insumos = $insumos;
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        return $this->subject('Presupuesto de Insumos')
                ->markdown('emails.presupuesto.insumos')
                ->attachData($this->pdfContent, 'presupuesto_insumos.pdf', [
                    'mime' => 'application/pdf',
                ]);
    }
}
