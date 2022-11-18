<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Costumer extends Mailable
{
    use Queueable, SerializesModels;

    public $costumer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($costumer)
    {
        $this->costumer = $costumer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@estimular.org', 'Web Estimular')
        ->subject('Nuevo contacto a través de la web')
        ->markdown('email.costumer_contact')
        ->with('costumer', $this->costumer);
    }
}
