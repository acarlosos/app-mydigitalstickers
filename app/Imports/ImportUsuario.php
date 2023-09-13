<?php

namespace App\Imports;

use App\Usuario;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUsuario implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(is_null($row[5]) || !is_numeric($row[6]))
            return;

        $user =  new Usuario([
            'UsuarioLogin' => $row[5] ,
            'UsuarioSenha' => bcrypt('NOVA@1234'),
            'UsuarioNome' => $row[0],
            'UsuarioStatus' => 1 ,
            'UsuarioEmail' => $row[2],
            'UsuarioCelular' => $row[1],
            'UsuarioMatricula' => isset($row[6]) ? $row[6] : $row[3],
            'PerfilID' => 1,
            'UsuarioFoto' => 'NULL' ,
        ]);

        $cheeck = Usuario::where('UsuarioLogin', $user->UsuarioLogin)->first();
        dd($cheeck);

        return $user;
    }
}
