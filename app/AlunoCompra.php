<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoCompra extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'AlunoCompraID';


    protected $fillable = [
        'AlunoCompra',
        'AlunoCompraQuantidade',
        'AlunoCompraStatus',
        'UsuarioEscolaID',
    ];

    protected $guarded =[
        'AlunoCompraID',
        'AlunoCompraDTAtivacao',
        'UsuarioDTInativacao',
        'UsuarioDTBloqueio'
    ];

    protected $table = 'AlunoCompra';
}
