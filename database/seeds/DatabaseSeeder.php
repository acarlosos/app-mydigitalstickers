<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RedeSeed::class);
        $this->call(PerfilSeed::class);
        $this->call(TelaSeed::class);
        $this->call(PerfiltelaSeed::class);
        $this->call(UsuarioSeeder::class);
        // $this->call(EscolaSeed::class);
        // $this->call(UsuarioEcolaSeed::class);
        $this->call(EventoSeed::class);
        // $this->call(EventoEscolaSeed::class);
        // $this->call(TraducaoSeed::class);
        // $this->call(FaixaEventoSeed::class);
        // $this->call(AlunoCompraSeed::class);
        // $this->call(InformativoAcessoSeed::class);
        // $this->call(PontoSeed::class);
        // $this->call(PontoRecebidoSeed::class);
    }
}
