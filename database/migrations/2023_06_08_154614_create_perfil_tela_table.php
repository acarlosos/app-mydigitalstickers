<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilTelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `PerfilTela` (
            `PerfilTelaID` int(11) NOT NULL,
            `PerfilTelaStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
            `PerfilTelaDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `PerfilTelaDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
            `PerfilTelaDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
            `PerfilID` int(11) NOT NULL,
            `TelaID` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Relacionamento de Perfil e Tela/Menu';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PerfilTela');
    }
}
