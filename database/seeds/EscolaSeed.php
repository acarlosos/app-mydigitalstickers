<?php

use App\Escola;
use Illuminate\Database\Seeder;

class EscolaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(
            "INSERT INTO `Escola` (`EscolaID`, `Escola`, `EscolaCod`, `EscolaStatus`, `EscolaDTAtivacao`, `EscolaDTInativacao`, `EscolaDTBloqueio`, `EscolaSenha`, `EscolaValorFixo`, `EscolaValorVaviavel`, `EscolaMotivoBloqueio`, `EscolaTelefone`, `EscolaCelular`, `EscolaCNPJ`, `EscolaCelularPix`, `RedeID`, `EscolaDTCadastro`, `EscolaDiaVencimento`, `EscolaDTExpiracao`, `EscolaEmail`, `EscolaNomeMoeda`) VALUES
            (1, 'CNA Vitória Jardim da Penha', 'CNA ESvixjp', 1, '2021-03-14 23:42:11', NULL, NULL, '28722c18233cadd22bf85b447b010c87b1931b0a', '50.00', '0.10', NULL, '2732078555', '27992334992', '12989403000130', NULL, 1, '2021-02-11 22:56:02', 10, '2022-01-11 23:42:11', 'vitoriajddapenha@cna.com.br', NULL),
            (2, 'CNA Vitoria Praia do Canto', 'CNA ESvixpc', 1, '2021-03-01 22:49:41', NULL, NULL, '28722c18233cadd22bf85b447b010c87b1931b0a', '50.00', '0.10', NULL, '2732078885', '27988198667', '36011663000159', NULL, 1, '2021-02-11 23:09:48', 10, '2022-02-10 22:49:41', 'ewaew@rewr.com', NULL),
            (3, 'CNA Guarapari', 'CNA ESguara', 1, '2023-05-26 06:59:32', NULL, NULL, '28722c18233cadd22bf85b447b010c87b1931b0a', '100.00', '1.00', NULL, '2733498789', '27998746667', '09175535000178', NULL, 1, '2021-02-22 23:33:46', 10, '9999-12-31 06:59:32', NULL, NULL),
            (4, 'CNA Serra', 'CNA ESserra', 1, '2021-03-01 22:50:25', NULL, NULL, '28722c18233cadd22bf85b447b010c87b1931b0a', '50.00', '0.10', NULL, '2732814555', '27988198667', '10436726000125', NULL, 1, '2021-03-01 18:10:57', 10, '9999-12-31 22:50:25', NULL, NULL);"
        );
    }
}
