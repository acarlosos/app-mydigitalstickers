<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoEscola extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'EventoEscolaID';
    protected $fillable = [
        'EventoStatus',
        'EventoID',
        'EscolaID'
    ];
    protected $guarded = ['EventoEscolaID'];
    protected $table = 'EventoEscola';

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
