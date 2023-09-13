<?php

namespace App\Mail;

use App\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $usuario;
    protected $senha;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Usuario $usuario, $senha)
    {
        $this->usuario = $usuario;
        $this->senha = $senha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $usuario = $this->usuario;
        $senha = $this->senha;
        $url = env('APP_URL' , 'https://dev.mydigitalstickers.com');

        return $this->subject('Recuperação de senha')
        ->from( 'contato@mydigitalstickers.com' )
        ->view('emails.forgot-password', compact('usuario', 'url', 'senha'));

    }
}
