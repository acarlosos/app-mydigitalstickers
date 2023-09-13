<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InformativoAcesso extends Model
{
    
    public $timestamps = false;
    protected $table = 'InformativoAcesso';

    protected $primaryKey = 'InformativoAcessoID';
    protected $fillable = [
        'InformativoAcesso', 
        'InformativoAcessoDTFim', 
        'EscolaID', 
        'InformativoAcessoDTIni'
    ];
    protected $casts = [
        'InformativoAcessoDTIni' => 'date',
        'InformativoAcessoDTFim' => 'date'
    ];
    public function setInformativoAcessoDTFimAttribute($value)
    {
        $this->attributes['InformativoAcessoDTFim'] = Carbon::createFromFormat('d/m/Y', $value);
    }
    public function setInformativoAcessoDTIniAttribute($value)
    {
        $this->attributes['InformativoAcessoDTIni'] = Carbon::createFromFormat('d/m/Y' ,$value);
    }

    public function escola()
    {
        return $this->belongsTo(Escola::class,'EscolaID');
    }
}
