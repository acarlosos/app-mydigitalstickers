<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `Escola` (
            `EscolaID` int(11) NOT NULL,
            `Escola` varchar(255) CHARACTER SET latin1 NOT NULL,
            `EscolaCod` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'cod para integracao',
            `EscolaStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado, 4 -> Prospect',
            `EscolaDTAtivacao` datetime DEFAULT NULL,
            `EscolaDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `EscolaDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
            `EscolaSenha` text CHARACTER SET latin1 NOT NULL,
            `EscolaValorFixo` decimal(13,2) NOT NULL,
            `EscolaValorVaviavel` decimal(13,2) NOT NULL,
            `EscolaMotivoBloqueio` text CHARACTER SET latin1,
            `EscolaTelefone` decimal(11,0) DEFAULT NULL,
            `EscolaCelular` decimal(11,0) DEFAULT NULL,
            `EscolaCNPJ` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
            `EscolaCelularPix` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'chave pix da escola',
            `RedeID` int(11) NOT NULL,
            `EscolaDTCadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `EscolaDiaVencimento` int(11) DEFAULT NULL,
            `EscolaDTExpiracao` datetime DEFAULT NULL,
            `EscolaEmail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
            `EscolaNomeMoeda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Escolas';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Escola');
    }
}
