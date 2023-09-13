<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoEscolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `EventoEscola` (
            `EventoEscolaID` int(11) NOT NULL,
            `EventoStatus` int(11) NOT NULL DEFAULT '1',
            `EventoID` int(11) NOT NULL,
            `EscolaID` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Relacionamento de Escola com Eventos';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('EventoEscola');
    }
}
