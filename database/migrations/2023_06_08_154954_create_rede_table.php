<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `Rede` (
            `RedeID` int(11) NOT NULL,
            `Rede` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'nome',
            `RedeCod` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'cod para integracao',
            `RedeStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
            `RedeDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data da Ativao / Criao',
            `RedeDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `RedeDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
            `RedeNomeMoeda` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Rede Escolares';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Rede');
    }
}
