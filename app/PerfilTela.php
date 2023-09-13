<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilTela extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'PerfilTelaID';
    protected $fillable = [
        'PerfilTela',  
        'PerfilTelaStatus',
        'PerfilTelaDTAtivacao',
        'PerfilTelaDTInativacao',
        'PerfilTelaDTBloqueio',
        'TelaID',
        'PerfilID'];
    protected $guarded = ['PerfilTelaID'];
    protected $table = 'PerfilTela';
}
