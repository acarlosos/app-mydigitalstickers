<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement(
            "CREATE TABLE `AlunoCompra` (
                `AlunoCompraID` int(11) NOT NULL,
                `AlunoCompraQuantidade` int(11) NOT NULL COMMENT 'nome',
                `AlunoCompraStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo',
                `AlunoCompraDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
                `AlunoCompraDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Ativao',
                `UsuarioEscolaID` int(11) NOT NULL COMMENT 'Aluno que realizou a troca do ponto'
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Registro de Pontos que o Aluno trocou/Devolveu para a Escola';"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AlunoCompra');
    }
}
