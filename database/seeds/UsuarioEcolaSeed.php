<?php

use Illuminate\Database\Seeder;

class UsuarioEcolaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `UsuarioEscola` (`UsuarioEscolaID`, `UsuarioEscolaStatus`, `UsuarioEscolaDTInativacao`, `UsuarioEscolaDTAtivacao`, `UsuarioEscolaDTBloqueio`, `UsuarioID`, `EscolaID`) VALUES
        (48, 1, NULL, '2021-05-06 22:01:35', NULL, 7, 4),
        (54, 1, NULL, '2021-05-06 22:02:16', NULL, 10, 3),
        (55, 1, NULL, '2021-05-06 22:05:35', NULL, 1, 1),
        (56, 1, NULL, '2021-05-06 22:05:35', NULL, 2, 1),
        (57, 1, NULL, '2021-05-06 22:05:35', NULL, 3, 1),
        (58, 1, NULL, '2021-05-06 22:05:35', NULL, 4, 1),
        (59, 1, NULL, '2021-05-06 22:05:35', NULL, 9, 1),
        (65, 1, NULL, '2023-04-29 05:17:12', NULL, 12, 2),
        (66, 1, NULL, '2023-04-29 05:17:12', NULL, 17, 2),
        (67, 1, NULL, '2023-04-29 05:17:12', NULL, 22, 2),
        (68, 1, NULL, '2023-04-29 05:17:12', NULL, 6, 2);");
    }
}

