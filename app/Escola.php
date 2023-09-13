<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



class Escola extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'EscolaID';
    protected $fillable = [
        'Escola',
        'EscolaCod',
        'EscolaStatus',
        'EscolaDTAtivacao',
        'EscolaDTInativacao',
        'EscolaDTBloqueio',
        'EscolaDTProspect',
        'EscolaSenha',
        'EscolaEmail',
        'EscolaValorFixo',
        'EscolaValorVaviavel',
        'EscolaMotivoBloqueio',
        'EscolaTelefone',
        'EscolaCelular',
        'EscolaCNPJ',
        'EscolaCelularPix',
        'EscolaNomeMoeda',
        'RedeID',
        'EscolaDiaVencimento',
        'EscolaDTExpiracao',
        'EscolaLogradouro',
        'EscolaNumero',
        'EscolaComplemento',
        'EscolaBairro',
        'EscolaCidade',
        'EscolaUF',
        'EscolaCep',

    ];
    protected $casts = [
        'EscolaDTExpiracao' => 'date',
        'EscolaDTCadastro' => 'datetime',
        'EscolaDTAtivacao' => 'datetime',
        'EscolaDTInativacao' => 'datetime',
        'EscolaDTBloqueio' => 'datetime',
    ];

    public function dates()
    {
        return [
            'Data Cadastro: '=>'EscolaDTCadastro',
            'Data Ativação: '=>'EscolaDTAtivacao',
            'Data Inativação: '=>'EscolaDTInativacao',
            'Data Bloqueio: '=>'EscolaDTBloqueio',
        ];
    }
    public function setEscolaDTExpiracaoAttribute($value)
    {
        $this->attributes['EscolaDTExpiracao'] = Carbon::createFromFormat('d/m/Y', $value);
    }
    protected $guarded = ['EscolaID'];
    protected $table = 'Escola';


}
