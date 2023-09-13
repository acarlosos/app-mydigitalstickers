<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInEscola extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Escola', function (Blueprint $table) {
            $table->string('EscolaLogradouro')->nullable();
            $table->string('EscolaNumero')->nullable();
            $table->string('EscolaComplemento')->nullable();
            $table->string('EscolaBairro')->nullable();
            $table->string('EscolaCidade')->nullable();
            $table->string('EscolaUF')->nullable();
            $table->string('EscolaCep')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Escola', function (Blueprint $table) {
            $table->dropColumn([
            'EscolaLogradouro',
            'EscolaNumero',
            'EscolaComplemento',
            'EscolaBairro',
            'EscolaCidade',
            'EscolaUF',
            'EscolaCep',
            ]);
        });
    }
}
