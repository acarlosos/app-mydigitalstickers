<?php

use Illuminate\Database\Seeder;

class EventoEscolaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `EventoEscola` (`EventoEscolaID`, `EventoStatus`, `EventoID`, `EscolaID`) VALUES
        (106, 1, 2, 2),
        (107, 1, 3, 2),
        (108, 1, 4, 2),
        (109, 1, 5, 2),
        (110, 1, 7, 2),
        (111, 1, 9, 2),
        (112, 1, 10, 2),
        (119, 1, 5, 3),
        (120, 1, 9, 3),
        (121, 1, 10, 3),
        (122, 1, 1, 1),
        (123, 1, 2, 1),
        (124, 1, 3, 1),
        (125, 1, 4, 1),
        (126, 1, 5, 1),
        (127, 1, 6, 1),
        (128, 1, 7, 1),
        (129, 1, 8, 1),
        (130, 1, 9, 1);");
    }
}
