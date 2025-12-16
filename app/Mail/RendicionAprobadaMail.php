<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RendicionAprobadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $asistente;
    public $ruta_pdf;

    public function __construct($asistente, $ruta_pdf)
    {
        $this->asistente = $asistente;
        $this->ruta_pdf = $ruta_pdf;
    }

    public function build()
    {
        return $this->subject('Rendición de Caja Aprobada')
                    ->view('emails.rendicion.aprobada')
                    ->attach($this->ruta_pdf);
    }
}

?>
