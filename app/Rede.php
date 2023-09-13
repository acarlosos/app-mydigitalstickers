<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Rede extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'RedeID';
    protected $fillable = ['Rede', 'RedeCod', 'RedeStatus', 'RedeNomeMoeda'];
    protected $guarded = ['RedeID', 'RedeDTAtivacao', 'RedeDTInativacao', 'RedeDTBloqueio'];
    protected $table = 'Rede';
}
