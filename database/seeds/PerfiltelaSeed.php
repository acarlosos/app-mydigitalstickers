<?php

use Illuminate\Database\Seeder;

class PerfiltelaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `PerfilTela` (`PerfilTelaID`, `PerfilTelaStatus`, `PerfilTelaDTInativacao`, `PerfilTelaDTAtivacao`, `PerfilTelaDTBloqueio`, `PerfilID`, `TelaID`) VALUES
        (562, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 1),
        (563, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 2),
        (564, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 3),
        (565, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 4),
        (566, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 7),
        (567, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 8),
        (568, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 9),
        (569, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 10),
        (570, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 11),
        (571, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 12),
        (572, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 13),
        (573, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 15),
        (574, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 16),
        (575, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 17),
        (576, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 18),
        (577, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 19),
        (578, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 27),
        (579, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 29),
        (580, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 30),
        (581, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 31),
        (582, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 32),
        (583, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 33),
        (584, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 34),
        (585, 1, NULL, '2021-05-05 22:32:02', NULL, 2, 35),
        (617, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 2),
        (618, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 3),
        (619, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 4),
        (620, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 8),
        (621, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 12),
        (622, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 17),
        (623, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 27),
        (624, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 29),
        (625, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 30),
        (626, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 31),
        (627, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 33),
        (628, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 34),
        (629, 1, NULL, '2021-05-05 22:34:22', NULL, 4, 35),
        (658, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 2),
        (659, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 4),
        (660, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 8),
        (661, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 17),
        (662, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 18),
        (663, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 27),
        (664, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 29),
        (665, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 30),
        (666, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 31),
        (667, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 33),
        (668, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 34),
        (669, 1, NULL, '2021-05-09 18:03:27', NULL, 5, 35),
        (673, 1, NULL, '2021-05-09 18:04:00', NULL, 1, 1),
        (674, 1, NULL, '2021-05-09 18:04:00', NULL, 1, 2),
        (675, 1, NULL, '2021-05-09 18:04:00', NULL, 1, 17),
        (680, 1, NULL, '2021-05-20 03:00:56', NULL, 6, 2),
        (681, 1, NULL, '2021-05-20 03:00:56', NULL, 6, 17),
        (682, 1, NULL, '2021-05-20 03:00:56', NULL, 6, 30),
        (683, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 1),
        (684, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 2),
        (685, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 3),
        (686, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 4),
        (687, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 8),
        (688, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 17),
        (689, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 18),
        (690, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 27),
        (691, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 32),
        (692, 1, NULL, '2021-06-07 01:30:17', NULL, 3, 34);");
    }
}
