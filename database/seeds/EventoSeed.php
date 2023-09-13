<?php

use App\Usuario;
use Illuminate\Database\Seeder;

class EventoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Usuario::where(['UsuarioEmail' => 'bremenkamp@outlook.com'])->first();

        DB::insert("INSERT INTO `Evento` (`EventoID`, `Evento`, `EventoCod`, `EventoStatus`, `EventoDTAtivacao`, `EventoDTInativacao`, `EventoDTBloqueio`, `UsuarioID`) VALUES
        (1, 'Evento Teste', 'eve_teste', 2, '2021-02-12 21:03:14', '2021-02-15 03:46:45', NULL, $user->UsuarioID),
        (2, 'Homework', 'HMWK', 1, '2021-02-14 23:51:38', NULL, NULL, $user->UsuarioID),
        (3, 'Web lessons', 'Webles', 1, '2021-02-14 23:56:42', NULL, NULL, $user->UsuarioID),
        (4, 'PArticipação eventos', 'Part_evento', 1, '2021-03-31 18:14:39', NULL, NULL, $user->UsuarioID),
        (5, 'Frequencia', 'Freq', 1, '2021-02-14 23:57:35', NULL, NULL, $user->UsuarioID),
        (6, 'Rematrícula 2021/2', 'Rema 2021/2', 1, '2021-06-07 04:50:24', NULL, NULL, $user->UsuarioID),
        (7, 'Compra material didático (MD)', 'Compra_MD', 1, '2023-05-26 05:17:54', NULL, NULL, $user->UsuarioID),
        (8, 'Ativação chave acesso MD 2021/1', 'Chave_MD 2020/1', 2, '2021-05-11 00:50:28', '2021-06-07 04:50:45', NULL, $user->UsuarioID),
        (9, 'Nota prova oral', 'nt_prv_oral', 1, '2021-02-16 00:24:21', NULL, NULL, $user->UsuarioID),
        (10, 'Ativação chave acesso MD 2022/1', 'MD2022/1', 1, '2021-12-13 23:34:16', NULL, NULL, $user->UsuarioID);");
    }
}
