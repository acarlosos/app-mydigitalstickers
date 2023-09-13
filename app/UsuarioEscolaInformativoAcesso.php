<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UsuarioEscolaInformativoAcesso extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'UsuarioEscolaInformativoAcessoID';
    protected $fillable = [
        'UsuarioEscolaInformativoAcesso', 
        'UsuarioEscolaInformativoAcessoIDDTAtivacao',
        'InformativoAcessoID',
        'UsuarioEscolaID'    
    ];

    protected $casts = [
        'UsuarioEscolaInformativoAcessoIDDTAtivacao' => 'date'
    ];
    public function setUsuarioEscolaInformativoAcessoIDDTAtivacaoAttribute($value)
    {
        $this->attributes['UsuarioEscolaInformativoAcessoIDDTAtivacao'] = Carbon::createFromFormat('d/m/Y', $value);
    }
    public function usuarioescola()
    {
        return $this->belongsTo(UsuarioEscola::class,'UsuarioEscolaID');
    }

    protected $guarded = ['UsuarioEscolaInformativoAcessoID'];
    protected $table = 'UsuarioEscolaInformativoAcesso';
    
}

