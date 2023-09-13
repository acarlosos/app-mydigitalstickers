<?php

use Illuminate\Database\Seeder;

class AlunoCompraSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `AlunoCompra` (`AlunoCompraID`, `AlunoCompraQuantidade`, `AlunoCompraStatus`, `AlunoCompraDTInativacao`, `AlunoCompraDTAtivacao`, `UsuarioEscolaID`) VALUES
        (2, 100, 1, NULL, '2023-05-26 14:54:24', 56),
        (4, 10, 1, NULL, '2021-12-14 20:20:29', 56),
        (8, 13, 1, NULL, '2023-05-26 11:56:22', 56);");
    }
}
