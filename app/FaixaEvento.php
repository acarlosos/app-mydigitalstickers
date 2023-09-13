<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class FaixaEvento extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'FaixaEventoID';

    protected $fillable =
    [

        'FaixaEventoID',
        'FaixaEventoCod',
        'FaixaEventoStatus',
        'FaixaEventoNumIni',
        'FaixaEventoNumFim',
        'FaixaEventoDTIni',
        'FaixaEventoDTFim',
        'FaixaEventoPontoQuantidade',
        'EventoEscolaID'

    ];
    protected $casts = [
        'FaixaEventoDTIni' => 'date',
        'FaixaEventoDTFim' => 'date'
    ];
    public function setFaixaEventoDTIniAttribute($value)
    {
        $this->attributes['FaixaEventoDTIni'] = Carbon::createFromFormat('d/m/Y', $value);
    }
    public function setFaixaEventoDTFimAttribute($value)
    {
        $this->attributes['FaixaEventoDTFim'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    protected $guarded =
    [

        'FaixaEventoID',
        'UsuarioDTAtivacao',
        'UsuarioDTInativacao',
        'UsuarioDTBloqueio'

    ];

    protected $table = 'FaixaEvento';
}
