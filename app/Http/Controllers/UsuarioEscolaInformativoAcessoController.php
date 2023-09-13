<?php

namespace App\Http\Controllers;

use App\UsuarioEscolaInformativoAcesso;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcessoCreate;
use App\Http\Requests\UsuarioEscolaInformativoAcesso\UsuarioEscolaInformativoAcesoAlter;
use Carbon\Carbon;

class UsuarioEscolaInformativoAcessoController extends Controller
{
    public function index()
    {
        $UsuarioEscolas =DB::table('UsuarioEscola')
                ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
                ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'UsuarioEscola.UsuarioEscolaID',
                    'Usuario.UsuarioNome',
                    'Escola.Escola'
                )
                ->where('Perfil.PerfilCod', '!=', 'al')
                ->orderby('Escola.Escola', 'ASC')
                ->get();
        return view('usuarioescolainformativoacesso/usuarioescolainformativoacesso', compact('UsuarioEscolas'));
    
    }
    
    public function create()
    {
        return view('usuarioescolainformativoacesso.create');
    }

    public function store(UsuarioEscolaInformativoAcessoCreate $request)
    {
        $validated = $request->validated();

        $usuarioescolainformativoacesso = new UsuarioEscolaInformativoAcesso;
        $usuarioescolainformativoacesso->UsuarioEscolaID = request('UsuarioEscolaID');
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso = request('UsuarioEscolaInformativoAcesso');
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao = request('UsuarioEscolaInformativoAcessoIDDTAcao');
        
        $usuarioescolainformativoacesso->save();
    
        return redirect()->back()
            ->with('status', 'UsuarioEscolaInformativoAcesso relacionado com o Usuario com sucesso!');    
    }

    public function show()
    {
        $UsuarioEscolaInformativoAcessos = new UsuarioEscolaInformativoAcesso;
        $UsuarioEscolaInformativoAcessos = UsuarioEscolaInformativoAcesso::all();
    }

    public function list()
    {
        $UsuarioEscolaInformativoAcessos =DB::table('UsuarioEscolaInformativoAcesso')
            ->join('UsuarioEscola','UsuarioEscolaInformativoAcesso.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->select(
                'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoID',
                'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcesso',
                'UsuarioEscolaInformativoAcesso.UsuarioEscolaInformativoAcessoIDDTAcao',
                'UsuarioEscolaInformativoAcesso.UsuarioEscolaID',
                'UsuarioEscola.UsuarioID',
                'Escola.Escola'
            )
                ->get();
        return view('usuarioescolainformativoacesso/show', compact('UsuarioEscolaInformativoAcessos'));
    }

    public function edit($UsuarioEscolaInformativoAcessoID)
    {
        $usuarioescolainformativoacesso = UsuarioEscolaInformativoAcessos::findOrFail($UsuarioEscolaInformativoAcessosID);
        $usuarioescolainformativoacesso['UsuarioEscola'] =DB::table('UsuarioEscola')
        ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
        ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
        ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')

        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'Usuario.UsuarioNome',
            'Escola.Escola'
        )
        ->where('Perfil.PerfilCod', '!=', 'al')
        ->get();
        return view('usuarioescolainformativoacesso/editar', compact('usuarioescolainformativoacesso'));
    }

    public function update(UsuarioEscolaInformativoAcessoAlter $request, $id)
    {
        $validated = $request->validated();

        $usuarioescolainformativoacesso = new UsuarioEscolaInformativoAcesso;
        
        $usuarioescolainformativoacesso = UsuarioEscolaInformativoAcesso::findOrFail($id);

        $usuarioescolainformativoacesso->UsuarioEscolaID = request('UsuarioEscolaID');
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso = request('UsuarioEscolaInformativoAcesso');
        
        
        $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAcao = request('UsuarioEscolaInformativoAcessoIDDTAcao');
        
        $usuarioescolainformativoacesso->save();
        return redirect()->back()
            ->with('status', 'Ponto alterado com sucesso!');
    }

    public function destroy($id)
    {
        $usuarioescolainformativoacesso = UsuarioEscolaInformativoAcesso::findOrFail($id);
        $usuarioescolainformativoacesso->delete();
        return redirect()->route('usuarioescolainformativoacesso.index')->with('alert-success', 'UsuarioEscolaInformativoAcesso deletada com sucesso!');
    }
}
