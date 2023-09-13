<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultImageInUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Usuario', function (Blueprint $table) {
            $table->string('UsuarioFoto')->default(asset('vendor/img/pandaFeliz.png'))->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Usuario', function (Blueprint $table) {
            $table->string('UsuarioFoto')->default(asset('vendor/img/pandaFeliz.png'))->change();
        });
    }
}
