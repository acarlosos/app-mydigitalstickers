<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `Evento` (
            `EventoID` int(11) NOT NULL,
            `Evento` varchar(255) CHARACTER SET latin1 NOT NULL,
            `EventoCod` varchar(255) CHARACTER SET latin1 NOT NULL,
            `EventoStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
            `EventoDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data da Ativao / Criao',
            `EventoDTInativacao` datetime DEFAULT NULL,
            `EventoDTBloqueio` datetime DEFAULT NULL,
            `UsuarioID` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Tabela que com os registros dos evento';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Evento');
    }
}
