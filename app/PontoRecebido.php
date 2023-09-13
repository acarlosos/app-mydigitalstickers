<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PontoRecebido extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'PontoRecebidoID';

    protected $fillable =
        [

            'PontoRecebidoQuantidade',
            'UsuarioEscolaID',
            'UsuarioID',
            'FaixaEventoID',
            'PontoRecebidoStatus'

        ];

    protected $guarded =
        [

            'PontoRecebidoDTAtivacao',
            'PontoRecebidoDTInativacao'

        ];

    protected $table = 'PontoRecebido';
}
