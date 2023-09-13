<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformativoAcessoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `InformativoAcesso` (
            `InformativoAcessoID` int(11) NOT NULL,
            `InformativoAcesso` text CHARACTER SET latin1 NOT NULL,
            `InformativoAcessoDTIni` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `InformativoAcessoDTFim` datetime NOT NULL,
            `EscolaID` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro do Informativo de Primeiro Acesso';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('InformativoAcesso');
    }
}
