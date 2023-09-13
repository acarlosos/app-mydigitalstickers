<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `AlunoCompra`
        ADD PRIMARY KEY (`AlunoCompraID`),
        ADD KEY `fk_AlunoCompra_UsuarioEscola` (`UsuarioEscolaID`);");


        DB::statement("ALTER TABLE `Escola`
        ADD PRIMARY KEY (`EscolaID`),
        ADD UNIQUE KEY `uk_EscolaCod` (`EscolaCod`),
        ADD KEY `fk_Escola_Rede` (`RedeID`);");


        DB::statement("ALTER TABLE `Evento`
        ADD PRIMARY KEY (`EventoID`),
        ADD UNIQUE KEY `uk_EventoCod` (`EventoCod`),
        ADD KEY `fk_Evento_Usuario` (`UsuarioID`);");


        DB::statement("ALTER TABLE `EventoEscola`
        ADD PRIMARY KEY (`EventoEscolaID`),
        ADD UNIQUE KEY `uk_EventoEscola` (`EscolaID`,`EventoID`),
        ADD KEY `fk_EventoEscola_Evento` (`EventoID`);");


        DB::statement("ALTER TABLE `FaixaEvento`
        ADD PRIMARY KEY (`FaixaEventoID`),
        ADD KEY `fk_FaixaEvento_EventoEscola` (`EventoEscolaID`);");


        DB::statement("ALTER TABLE `InformativoAcesso`
        ADD PRIMARY KEY (`InformativoAcessoID`),
        ADD KEY `fk_InformativoAcesso_Escola` (`EscolaID`);");


        DB::statement("ALTER TABLE `Perfil`
        ADD PRIMARY KEY (`PerfilID`),
        ADD UNIQUE KEY `uk_PerfilCod` (`PerfilCod`);");


        DB::statement("ALTER TABLE `PerfilTela`
        ADD PRIMARY KEY (`PerfilTelaID`),
        ADD UNIQUE KEY `uk_PerfilTela` (`PerfilID`,`TelaID`),
        ADD KEY `fk_PerfilTela_Tela` (`TelaID`);");


        DB::statement("ALTER TABLE `Ponto`
        ADD PRIMARY KEY (`PontoID`),
        ADD KEY `fk_Ponto_UsuarioEscola` (`UsuarioEscolaID`);");


        DB::statement("ALTER TABLE `PontoRecebido`
        ADD PRIMARY KEY (`PontoRecebidoID`),
        ADD KEY `fk_PontoRecebido_UsuarioEscola` (`UsuarioEscolaID`),
        ADD KEY `fk_PontoRecebido_FaixaEvento` (`FaixaEventoID`);");


        DB::statement("ALTER TABLE `Rede`
        ADD PRIMARY KEY (`RedeID`),
        ADD UNIQUE KEY `uk_RedeCod` (`RedeCod`);");


        DB::statement("ALTER TABLE `Tela`
        ADD PRIMARY KEY (`TelaID`),
        ADD UNIQUE KEY `uk_Tela` (`Tela`);");


        DB::statement("ALTER TABLE `Traducao`
        ADD PRIMARY KEY (`TraducaoID`);");


        DB::statement("ALTER TABLE `Usuario`
        ADD PRIMARY KEY (`UsuarioID`),
        ADD UNIQUE KEY `uk_UsuarioLogin` (`UsuarioLogin`),
        ADD KEY `fk_Usuario_Perfil` (`PerfilID`);");


        DB::statement("ALTER TABLE `UsuarioEscola`
        ADD PRIMARY KEY (`UsuarioEscolaID`),
        ADD UNIQUE KEY `uk_UsuarioEscola` (`EscolaID`,`UsuarioID`),
        ADD KEY `fk_UsuarioEscola_Usuario` (`UsuarioID`);");


        DB::statement("ALTER TABLE `UsuarioEscolaInformativoAcesso`
        ADD PRIMARY KEY (`UsuarioEscolaInformativoAcessoID`),
        ADD UNIQUE KEY `uk_UsuarioEscolaInformativoAcesso` (`UsuarioEscolaID`,`InformativoAcessoID`),
        ADD KEY `fk_UsuarioEscolaInformativoAcesso_InformativoAcesso` (`InformativoAcessoID`);");




        DB::statement("ALTER TABLE `AlunoCompra`
        MODIFY `AlunoCompraID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;");


        DB::statement("ALTER TABLE `Escola`
        MODIFY `EscolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;");


        DB::statement("ALTER TABLE `Evento`
        MODIFY `EventoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;");


        DB::statement("ALTER TABLE `EventoEscola`
        MODIFY `EventoEscolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;");


        DB::statement("ALTER TABLE `FaixaEvento`
        MODIFY `FaixaEventoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;");


        DB::statement("ALTER TABLE `InformativoAcesso`
        MODIFY `InformativoAcessoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;");


        DB::statement("ALTER TABLE `Perfil`
        MODIFY `PerfilID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;");


        DB::statement("ALTER TABLE `PerfilTela`
        MODIFY `PerfilTelaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=693;");


        DB::statement("ALTER TABLE `Ponto`
        MODIFY `PontoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;");


        DB::statement("ALTER TABLE `PontoRecebido`
        MODIFY `PontoRecebidoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;");


        DB::statement("ALTER TABLE `Rede`
        MODIFY `RedeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;");


        DB::statement("ALTER TABLE `Tela`
        MODIFY `TelaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;");


        DB::statement("ALTER TABLE `Traducao`
        MODIFY `TraducaoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");


        DB::statement("ALTER TABLE `Usuario`
        MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;");


        DB::statement("ALTER TABLE `UsuarioEscola`
        MODIFY `UsuarioEscolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;");


        DB::statement("ALTER TABLE `UsuarioEscolaInformativoAcesso`
        MODIFY `UsuarioEscolaInformativoAcessoID` int(11) NOT NULL AUTO_INCREMENT;");




        DB::statement("ALTER TABLE `AlunoCompra`
        ADD CONSTRAINT `fk_AlunoCompra_UsuarioEscola` FOREIGN KEY (`UsuarioEscolaID`) REFERENCES `UsuarioEscola` (`UsuarioEscolaID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `Escola`
        ADD CONSTRAINT `fk_Escola_Rede` FOREIGN KEY (`RedeID`) REFERENCES `Rede` (`RedeID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `Evento`
        ADD CONSTRAINT `fk_Evento_Usuario` FOREIGN KEY (`UsuarioID`) REFERENCES `Usuario` (`UsuarioID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `EventoEscola`
        ADD CONSTRAINT `fk_EventoEscola_Escola` FOREIGN KEY (`EscolaID`) REFERENCES `Escola` (`EscolaID`) ON DELETE CASCADE,
        ADD CONSTRAINT `fk_EventoEscola_Evento` FOREIGN KEY (`EventoID`) REFERENCES `Evento` (`EventoID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `FaixaEvento`
        ADD CONSTRAINT `fk_FaixaEvento_EventoEscola` FOREIGN KEY (`EventoEscolaID`) REFERENCES `EventoEscola` (`EventoEscolaID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `InformativoAcesso`
        ADD CONSTRAINT `fk_InformativoAcesso_Escola` FOREIGN KEY (`EscolaID`) REFERENCES `Escola` (`EscolaID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `PerfilTela`
        ADD CONSTRAINT `fk_PerfilTela_Perfil` FOREIGN KEY (`PerfilID`) REFERENCES `Perfil` (`PerfilID`) ON DELETE CASCADE,
        ADD CONSTRAINT `fk_PerfilTela_Tela` FOREIGN KEY (`TelaID`) REFERENCES `Tela` (`TelaID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `Ponto`
        ADD CONSTRAINT `fk_Ponto_UsuarioEscola` FOREIGN KEY (`UsuarioEscolaID`) REFERENCES `UsuarioEscola` (`UsuarioEscolaID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `PontoRecebido`
        ADD CONSTRAINT `fk_PontoRecebido_FaixaEvento` FOREIGN KEY (`FaixaEventoID`) REFERENCES `FaixaEvento` (`FaixaEventoID`) ON DELETE CASCADE,
        ADD CONSTRAINT `fk_PontoRecebido_UsuarioEscola` FOREIGN KEY (`UsuarioEscolaID`) REFERENCES `UsuarioEscola` (`UsuarioEscolaID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `Usuario`
        ADD CONSTRAINT `fk_Usuario_Perfil` FOREIGN KEY (`PerfilID`) REFERENCES `Perfil` (`PerfilID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `UsuarioEscola`
        ADD CONSTRAINT `fk_UsuarioEscola_Escola` FOREIGN KEY (`EscolaID`) REFERENCES `Escola` (`EscolaID`) ON DELETE CASCADE,
        ADD CONSTRAINT `fk_UsuarioEscola_Usuario` FOREIGN KEY (`UsuarioID`) REFERENCES `Usuario` (`UsuarioID`) ON DELETE CASCADE;");


        DB::statement("ALTER TABLE `UsuarioEscolaInformativoAcesso`
        ADD CONSTRAINT `fk_UsuarioEscolaInformativoAcesso_InformativoAcesso` FOREIGN KEY (`InformativoAcessoID`) REFERENCES `InformativoAcesso` (`InformativoAcessoID`) ON DELETE CASCADE,
        ADD CONSTRAINT `fk_UsuarioEscolaInformativoAcesso_UsuarioEscola` FOREIGN KEY (`UsuarioEscolaID`) REFERENCES `UsuarioEscola` (`UsuarioEscolaID`) ON DELETE CASCADE;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
