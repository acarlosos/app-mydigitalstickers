<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'EventoID';

    protected $fillable =
    [

        'Evento',
        'EventoCod',
        'EventoStatus',
        'EventoTipo',


    ];

    protected $guarded =
    [

        'EventoID',
        'EventoDTAtivacao',
        'EventoDTInativacao',
        'EventoDTBloqueio'

    ];

    protected $table = 'Evento';
    protected $casts = [
        'EventoTipo' => 'boolean'
    ];
}
