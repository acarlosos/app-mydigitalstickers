<?php

use App\Perfil;
use Illuminate\Database\Seeder;

class PerfilSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(
            "INSERT INTO `Perfil` (`PerfilID`, `Perfil`, `PerfilCod`, `PerfilStatus`, `PerfilDTInativacao`, `PerfilDTAtivacao`, `PerfilDTBloqueio`) VALUES
            (1, 'Aluno', 'al', 1, NULL, '2021-02-23 23:54:27', NULL),
            (2, 'Master', 'master', 1, NULL, '2021-02-15 03:08:11', NULL),
            (3, 'Administrativo', 'adm', 1, NULL, '2021-02-15 03:09:01', NULL),
            (4, 'Gestor da escola', 'gestor_escola', 1, NULL, '2021-02-15 03:09:56', NULL),
            (5, 'Secretária da escola', 'secret_escola', 1, NULL, '2021-04-27 02:36:35', NULL),
            (6, 'Professor', 'prof', 1, NULL, '2021-02-15 03:12:06', NULL);"
        );
    }
}
