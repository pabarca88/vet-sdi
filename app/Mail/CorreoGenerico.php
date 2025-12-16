<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoGenerico extends Mailable
{
    use Queueable, SerializesModels;

    public $detalle;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        $this->detalle = $datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(!empty($this->detalle['url_archivo']))
        {
            if(is_array($this->detalle['url_archivo']))
            {
                foreach ($this->detalle['url_archivo'] as $key => $value)
                {
                    $this->attach($value['url'], ['mime' => $value['mime']]);
                }
            }
            else
            {
                $this->attach($this->detalle['url_archivo']);
            }
            $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->view('app.mail.'.$this->detalle['blade'])
                    ->subject($this->detalle['asunto']);

            return $this;
        }
        else
        {
            return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->view('app.mail.'.$this->detalle['blade'])
                    ->subject($this->detalle['asunto']);
        }

    }
}
