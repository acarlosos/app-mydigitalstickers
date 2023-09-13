<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tela extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'TelaID';
    protected $fillable = ['Tela', 'TelaStatus'];
    protected $guarded = ['TelaID', 'TelaDTAtivacao', 'TelaDTInativacao', 'TelaDTBloqueio'];
    protected $table = 'Tela';
}
