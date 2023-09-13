<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $primaryKey = 'UsuarioID';

    protected $fillable =
    [
        'Usuario',
        'UsuarioLogin',
        'UsuarioSenha',
        'UsuarioNome',
        'UsuarioStatus',
        'UsuarioEmail',
        'UsuarioCelular',
        'UsuarioMatricula',
        'PerfilID',
        'UsuarioFoto',
    ];

    protected $guarded =
    [
        'UsuarioID',
        'UsuarioDTAtivacao',
        'UsuarioDTInativacao',
        'UsuarioDTBloqueio'
    ];

    protected $table = 'Usuario';

    public function getAuthPassword()
    {
        return $this->UsuarioSenha;
    }

    public function dates()
    {
        return [
            'Data Ativação: '=>'UsuarioDTAtivacao',
            'Data Inativação: '=>'UsuarioDTInativacao',
            'Data Bloqueio: '=>'UsuarioDTBloqueio',
        ];
    }

    protected $casts = [
        'UsuarioDTAtivacao' => 'datetime',
        'UsuarioDTInativacao' => 'datetime',
        'UsuarioDTBloqueio' => 'datetime',
    ];

}
