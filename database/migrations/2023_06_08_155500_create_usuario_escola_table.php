<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioEscolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `UsuarioEscola` (
            `UsuarioEscolaID` int(11) NOT NULL,
            `UsuarioEscolaStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
            `UsuarioEscolaDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `UsuarioEscolaDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
            `UsuarioEscolaDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
            `UsuarioID` int(11) NOT NULL,
            `EscolaID` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Relacionamento de Usuario com Escola, no importa o perfil';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_escola');
    }
}
