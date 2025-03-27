<?php

namespace App\Mail;

use App\Models\PasesSalida;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaseAutorizacion extends Mailable
{
    use Queueable, SerializesModels;

    public $pase;
    public $trabajador;
    public $jefe;

    /**
     * Crear una nueva instancia de mensaje de correo.
     *
     * @param  PasesSalida  $pase
     * @param  User  $trabajador
     * @param  User  $jefe
     * @return void
     */
    public function __construct(PasesSalida $pase, User $trabajador, User $jefe)
    {
        $this->pase = $pase;
        $this->trabajador = $trabajador;
        $this->jefe = $jefe;
    }

    /**
     * Construir el mensaje de correo.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.autorizacion')
            ->with([
                'pase' => $this->pase,
                'trabajador' => $this->trabajador,
                'jefe' => $this->jefe,
            ]);
    }
}

