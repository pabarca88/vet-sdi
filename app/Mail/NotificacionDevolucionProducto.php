<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionDevolucionProducto extends Mailable
{
    use Queueable, SerializesModels;

    public $paciente;
    public $items;

    /**
     * Create a new message instance.
     */
    public function __construct($paciente, $items)
    {
        $this->paciente = $paciente;
        $this->items = $items;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Notificación de Devolución de Producto')
                    ->view('emails.notificacion_devolucion_producto');
    }
}
