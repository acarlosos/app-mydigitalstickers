<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traducao extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'TraducaoID';
    protected $fillable =
        [
            'TraducaoTextoBr',
            'TraducaoTextoUs',
            'TraducaoTextoEs'
        ];

    protected $table = 'Traducao';
}
