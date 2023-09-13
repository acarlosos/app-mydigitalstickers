<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraducaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `Traducao` (
            `TraducaoID` int(11) NOT NULL,
            `TraducaoTextoBr` text COLLATE latin1_general_ci NOT NULL COMMENT 'Br',
            `TraducaoTextoUs` text COLLATE latin1_general_ci COMMENT 'Us',
            `TraducaoTextoEs` text COLLATE latin1_general_ci COMMENT 'Es'
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Tradução de texto Site';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Traducao');
    }
}
