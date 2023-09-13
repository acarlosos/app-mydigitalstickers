<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUsuarioIdInPontoRecebido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PontoRecebido', function (Blueprint $table) {
            $table->unsignedBigInteger('UsuarioID')->default(23);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('PontoRecebido', function (Blueprint $table) {
            $table->dropColumn('UsuarioID');
        });
    }
}
