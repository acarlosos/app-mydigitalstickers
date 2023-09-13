<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePontoRecebidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `PontoRecebido` (
            `PontoRecebidoID` int(11) NOT NULL,
            `PontoRecebidoQuantidade` int(11) NOT NULL COMMENT 'nome',
            `PontoRecebidoStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo',
            `PontoRecebidoDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `PontoRecebidoDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
            `UsuarioEscolaID` int(11) NOT NULL COMMENT 'Aluno que recebeu o ponto',
            `FaixaEventoID` int(11) NOT NULL COMMENT 'Faixa do Evento, da Escola. Na faixa h a qtd de pontos que o aluno recebeu'
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Pontos Recebimos Relao Faixa/Evento/Escola com Usurio (Aluno)';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PontoRecebido');
    }
}
