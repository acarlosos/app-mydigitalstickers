<?php

use Illuminate\Database\Seeder;

class FaixaEventoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `FaixaEvento` (`FaixaEventoID`, `FaixaEventoStatus`, `FaixaEventoDTInativacao`, `FaixaEventoDTAtivacao`, `FaixaEventoDTBloqueio`, `FaixaEventoNumIni`, `FaixaEventoNumFim`, `FaixaEventoDTIni`, `FaixaEventoDTFim`, `FaixaEventoPontoQuantidade`, `EventoEscolaID`) VALUES
        (7, 1, NULL, '2023-05-24 16:39:34', NULL, 80, 90, NULL, NULL, 5, 109),
        (9, 1, NULL, '2023-05-26 02:20:55', NULL, NULL, NULL, '2023-01-01', '2023-01-10', 10, 121),
        (10, 1, NULL, '2023-05-26 02:21:37', NULL, NULL, NULL, '2023-01-11', '2023-01-31', 2, 121),
        (11, 1, NULL, '2023-05-26 12:18:49', NULL, 1, 10, NULL, NULL, 100, 125);");
    }
}
