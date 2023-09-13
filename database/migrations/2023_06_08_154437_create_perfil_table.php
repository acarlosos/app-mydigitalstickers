<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `Perfil` (
            `PerfilID` int(11) NOT NULL,
            `Perfil` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'nome',
            `PerfilCod` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'cod para integracao',
            `PerfilStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
            `PerfilDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `PerfilDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
            `PerfilDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio'
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Perfil';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Perfil');
    }
}
