<?php

use App\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 8

        $Bremenkamp = Usuario::create(
            [
                'UsuarioLogin' => 'Bremenkamp',
                'UsuarioSenha' => sha1('NOVA@1234'),
                'UsuarioNome' => 'Fernando Bremenkamp',
                'UsuarioStatus' => 1 ,
                'UsuarioEmail' => 'bremenkamp@outlook.com',
                'UsuarioCelular' => '27998746667' ,
                'UsuarioMatricula' => 'Mat-bremenkamp' ,
                'PerfilID' => 2 ,
                'UsuarioFoto' => '',
                'UsuarioDTAtivacao' => now() ,
                'UsuarioDTInativacao' => NULL,
                'UsuarioDTBloqueio' => NULL
            ]
        );

        // 5
        $Antonio = Usuario::create(
            [
                'UsuarioLogin' => 'Antonio',
                'UsuarioSenha' => sha1('NOVA@1234'),
                'UsuarioNome' => 'Antonio Carlos',
                'UsuarioStatus' => 1 ,
                'UsuarioEmail' => 'antonio@jumps.com.br',
                'UsuarioCelular' => '27998746667' ,
                'UsuarioMatricula' => 'Mat-antonio' ,
                'PerfilID' => 2 ,
                'UsuarioFoto' => '',
                'UsuarioDTAtivacao' => now() ,
                'UsuarioDTInativacao' => NULL,
                'UsuarioDTBloqueio' => NULL
            ]
        );
    }
}
