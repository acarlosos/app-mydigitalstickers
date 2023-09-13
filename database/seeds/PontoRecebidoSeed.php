<?php

use Illuminate\Database\Seeder;

class PontoRecebidoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `PontoRecebido` (`PontoRecebidoID`, `PontoRecebidoQuantidade`, `PontoRecebidoStatus`, `PontoRecebidoDTInativacao`, `PontoRecebidoDTAtivacao`, `UsuarioEscolaID`, `FaixaEventoID`) VALUES
        (2, 100, 1, NULL, '2023-05-26 12:19:26', 56, 11);");
    }
}
