<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaixaEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `FaixaEvento` (
            `FaixaEventoID` int(11) NOT NULL,
            `FaixaEventoStatus` int(11) NOT NULL DEFAULT '1',
            `FaixaEventoDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `FaixaEventoDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
            `FaixaEventoDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
            `FaixaEventoNumIni` int(11) DEFAULT NULL,
            `FaixaEventoNumFim` int(11) DEFAULT NULL,
            `FaixaEventoDTIni` date DEFAULT NULL,
            `FaixaEventoDTFim` date DEFAULT NULL,
            `FaixaEventoPontoQuantidade` int(11) NOT NULL,
            `EventoEscolaID` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Faixa de Eventos/Escola com quantidade de Ponto';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('FaixaEvento');
    }
}
