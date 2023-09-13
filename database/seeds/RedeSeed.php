<?php

use Illuminate\Database\Seeder;

class RedeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `Rede` (`RedeID`, `Rede`, `RedeCod`, `RedeStatus`, `RedeDTAtivacao`, `RedeDTInativacao`, `RedeDTBloqueio`, `RedeNomeMoeda`) VALUES
        (1, 'Cultural Norte Americana', 'CNA', 1, '2023-04-27 21:09:51', NULL, NULL, 'CNA Dolar One'),
        (2, 'Yazigi', 'YZG', 1, '2021-05-09 17:27:25', NULL, NULL, 'Yazigi dolar'),
        (3, 'Cultura inglesa', 'CING', 1, '2023-04-27 18:10:51', NULL, NULL, 'Cultura Dolar');");
    }
}
