<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Repository\ExtratoRepository;
use App\Usuario;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlunoCarteiraController extends Controller
{
    public function search(Request $request)
    {
        return redirect()->route('carteira.index', ['UsuarioID' => $request->UsuarioID]);
    }
    public function index(Request $request)
    {
        try{
            $PerfilCod = $request->session()->get('PerfilCod');
            $EscolaID = $request->session()->get('EscolaID');
            $UsuarioID = $request->has('UsuarioID')  ? $request->UsuarioID : session()->get('UsuarioID');
            $repository = new ExtratoRepository();
            $AlunoCarteiraTot = $repository->saldo( $UsuarioID);
            $AlunoCarteira = $repository->carteira( $UsuarioID);

            if($PerfilCod == 'al'){
                return view('aluno.carteira.index', compact('AlunoCarteira','AlunoCarteiraTot'));
            }

            $Perfil = Perfil::where('PerfilCod', Perfil::ALUNO)->first();
            $Usuarios = Usuario::where('PerfilId', $Perfil->PerfilID)
                ->join('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID');

            if(!in_array($PerfilCod, [ Perfil::ADMINISTRATIVO, Perfil::MASTER])) {
                $Usuarios = $Usuarios->where('UsuarioEscola.EscolaID','=',$EscolaID);
            }
            $Usuarios = $Usuarios->get();
            $Usuario = Usuario::find($UsuarioID);

            return view('carteira/alunocarteira', compact('AlunoCarteira','AlunoCarteiraTot', 'Usuarios','Usuario', 'PerfilCod', 'UsuarioID'));
        }catch(\Exception $e ){
            return redirect()->back()->with('erro', 'Erro no carregamento');
        }
    }

}
