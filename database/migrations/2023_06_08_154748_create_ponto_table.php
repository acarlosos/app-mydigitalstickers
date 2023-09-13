<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePontoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `Ponto` (
            `PontoID` int(11) NOT NULL,
            `PontoQuantidade` int(11) NOT NULL COMMENT 'nome',
            `PontoStatus` int(11) NOT NULL DEFAULT '1',
            `PontoDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `PontoDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
            `PontoDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
            `UsuarioEscolaID` int(11) NOT NULL COMMENT 'Usuario/Escola que Cadastrou o ponto',
            `PontoOperacao` int(11) NOT NULL DEFAULT '1' COMMENT '1 => Adicao +, 2 => Subtracao -'
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Pontos';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ponto');
    }
}
