<?php

use Illuminate\Database\Seeder;

class InformativoAcessoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `InformativoAcesso` (`InformativoAcessoID`, `InformativoAcesso`, `InformativoAcessoDTIni`, `InformativoAcessoDTFim`, `EscolaID`) VALUES
        (1, 'lnçlknklk noononoononasdonon  ohnaposidháoidhfóaid   çalksdnalksndáoksnd    AÇSDKNAksdnókn', '2021-02-11 04:28:44', '9999-12-31 04:28:44', 1),
        (2, 'ononononononononono nono non on o no nononon onon on on on onon', '2021-02-18 03:20:56', '9999-12-31 03:20:56', 1),
        (3, 'novov disclamer', '2021-01-01 21:32:44', '9999-12-31 21:32:44', 2),
        (4, 'novo desclamer alterado', '2023-04-01 21:34:28', '9999-12-31 21:34:28', 2);");
    }
}
