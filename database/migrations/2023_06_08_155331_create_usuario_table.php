<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `Usuario` (
            `UsuarioID` int(11) NOT NULL,
            `UsuarioLogin` varchar(255) CHARACTER SET latin1 NOT NULL COMMENT 'login sistema\n',
            `UsuarioSenha` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'NOVA@1234' COMMENT 'senha para login',
            `UsuarioNome` varchar(255) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Nome',
            `UsuarioStatus` int(11) NOT NULL COMMENT '1 -> Ativo, 2 -> Inativo, 3 -> Bloqueado',
            `UsuarioDTAtivacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data da Ativao / Criao',
            `UsuarioDTInativacao` datetime DEFAULT NULL COMMENT 'Data Inativao',
            `UsuarioDTBloqueio` datetime DEFAULT NULL COMMENT 'Data de Bloqueio',
            `UsuarioEmail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
            `UsuarioCelular` decimal(11,0) DEFAULT NULL,
            `UsuarioMatricula` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
            `PerfilID` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cadastro de Usurio, Todos os usurios ficam nessa tabela, no importal qual o perfil';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Usuario');
    }
}
