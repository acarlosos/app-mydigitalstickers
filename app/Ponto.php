<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'PontoID';

    protected $fillable =
    [

        'Ponto',
        'PontoStatus',
        'PontoQuantidade',
        'UsuarioEscolaID',
        'PontoOperacao'

    ];

    protected $guarded =
    [

        'PontoID',
        'PontoDTAtivacao',
        'PontoDTInativacao',
        'PontoDTBloqueio'

    ];

    protected $table = 'Ponto';
}
