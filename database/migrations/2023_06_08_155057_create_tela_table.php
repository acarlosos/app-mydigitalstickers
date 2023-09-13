<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `Tela` (
            `TelaID` int(11) NOT NULL,
            `Tela` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'nome',
            `TelaStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
            `TelaDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `TelaDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
            `TelaDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
            `TelaOrdem` int(11) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Tela/Menu';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tela');
    }
}
