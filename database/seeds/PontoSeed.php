<?php

use Illuminate\Database\Seeder;

class PontoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `Ponto` (`PontoID`, `PontoQuantidade`, `PontoStatus`, `PontoDTInativacao`, `PontoDTAtivacao`, `PontoDTBloqueio`, `UsuarioEscolaID`, `PontoOperacao`) VALUES
        (1, 10000, 1, NULL, '2021-05-06 22:34:53', NULL, 48, 1),
        (2, 100000, 1, NULL, '2021-12-14 20:36:16', NULL, 48, 1);");
    }
}
