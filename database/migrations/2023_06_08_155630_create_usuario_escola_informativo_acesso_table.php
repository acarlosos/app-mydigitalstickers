<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioEscolaInformativoAcessoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `UsuarioEscolaInformativoAcesso` (
            `UsuarioEscolaInformativoAcessoID` int(11) NOT NULL,
            `UsuarioEscolaInformativoAcesso` int(11) NOT NULL COMMENT '1 -> Aprovado, 2 -> No Aprovado',
            `UsuarioEscolaInformativoAcessoIDDTAcao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
            `UsuarioEscolaID` int(11) NOT NULL,
            `InformativoAcessoID` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Relacionamento de Usurio com Informativo de Primeiro Acesso e Parecer de Aceite';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UsuarioEscolaInformativoAcesso');
    }
}
