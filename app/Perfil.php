<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Perfil extends Model
{

    const ALUNO = 'al';
    const PROFESSOR = 'prof';
    const ADMINISTRATIVO = 'adm';
    const MASTER = 'master';
    const GESTOR_ESCOLA = 'gestor_escola';
    const SECRET_ESCOLA = 'secret_escola';
    public $timestamps = false;
    protected $primaryKey = 'PerfilID';
    protected $fillable = ['Perfil', 'PerfilCod', 'PerfilStatus'];
    protected $guarded = ['PerfilID', 'PerfilDTAtivacao', 'PerfilDTInativacao', 'PerfilDTBloqueio'];
    protected $table = 'Perfil';
}
