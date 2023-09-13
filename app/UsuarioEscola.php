<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioEscola extends Model
{
    protected $table = 'UsuarioEscola';
    public $timestamps = false;
    protected $primaryKey = 'UsuarioEscolaID';
    protected $fillable = [
        'UsuarioEscola',
        'UsuarioEscolaStatus',
        'UsuarioID',
        'EscolaID'
    ];
    protected $guarded =
    [
        'UsuarioEscolaID',
        'UsuarioEscolaDTAtivacao',
        'UsuarioEscolaDTInativacao',
        'UsuarioEscolaDTBloqueio',
    ];
}
