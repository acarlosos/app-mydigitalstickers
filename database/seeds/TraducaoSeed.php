<?php

use Illuminate\Database\Seeder;

class TraducaoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `Traducao` (`TraducaoID`, `TraducaoTextoBr`, `TraducaoTextoUs`, `TraducaoTextoEs`) VALUES
        (1, 'Boa Noite', 'Good Night', 'Buenas Noches');");
    }
}
