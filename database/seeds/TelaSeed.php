<?php

use Illuminate\Database\Seeder;

class TelaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `Tela` (`TelaID`, `Tela`, `TelaStatus`, `TelaDTInativacao`, `TelaDTAtivacao`, `TelaDTBloqueio`, `TelaOrdem`) VALUES
        (1, 'alunocompra', 1, NULL, '2021-02-23 02:45:44', NULL, 15),
        (2, 'carteira', 1, NULL, '2021-02-14 00:38:39', NULL, 16),
        (3, 'escola', 1, NULL, '2021-04-28 00:46:02', NULL, 9),
        (4, 'escolacarteira', 1, NULL, '2021-02-14 00:39:21', NULL, 14),
        (7, 'evento', 1, NULL, '2021-02-14 00:42:23', NULL, 6),
        (8, 'eventoescola', 1, NULL, '2021-02-17 02:17:22', NULL, 10),
        (9, 'informativoacesso', 1, NULL, '2021-02-17 02:07:47', NULL, 3),
        (10, 'perfil', 1, NULL, '2021-02-17 02:18:36', NULL, 2),
        (11, 'perfiltela', 1, NULL, '2021-02-15 02:47:37', NULL, 5),
        (12, 'ponto', 1, NULL, '2021-02-15 03:54:49', NULL, 13),
        (13, 'rede', 1, NULL, '2021-02-14 00:44:11', NULL, 1),
        (15, 'tela', 1, NULL, '2021-03-06 11:37:27', NULL, 4),
        (16, 'traducao', 1, NULL, '2021-02-15 00:27:36', NULL, 7),
        (17, 'usuario', 1, NULL, '2021-02-15 00:28:00', NULL, 11),
        (18, 'usuarioescola', 1, NULL, '2021-02-15 00:49:05', NULL, 12),
        (19, 'usuarioescolainformativoacesso', 1, NULL, '2021-02-15 00:55:14', NULL, 8),
        (27, 'cadastrodeparametros', 1, NULL, '2021-04-27 22:00:11', NULL, NULL),
        (29, 'repassedepontosarquivo', 1, NULL, '2021-04-27 22:00:37', NULL, NULL),
        (30, 'repassedepontosmanual', 1, NULL, '2021-04-27 22:00:44', NULL, NULL),
        (31, 'administrarfaixaevento', 1, NULL, '2023-04-27 20:12:27', NULL, NULL),
        (32, 'cadescola', 1, NULL, '2021-05-05 14:52:08', NULL, NULL),
        (33, 'cadusuario', 1, NULL, '2021-05-05 14:52:22', NULL, NULL),
        (34, 'cadeventoescola', 1, NULL, '2021-05-05 22:00:30', NULL, NULL),
        (35, 'administrarfaixaeventonew', 1, NULL, '2021-05-05 22:20:55', NULL, NULL);");
    }
}
