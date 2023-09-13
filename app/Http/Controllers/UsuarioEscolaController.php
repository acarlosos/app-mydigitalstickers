<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\UsuarioEscola;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioEscola\UsuarioEscolaCreate;
use App\Http\Requests\UsuarioEscola\UsuarioEscolaAlter;


class UsuarioEscolaController extends Controller
{
    public function index()
    {
        $Dados = new UsuarioEscola;
        $Dados->EscolaID =DB::table('Escola')
                ->select(
                    'Escola.EscolaID',
                    'Escola.Escola'
                )
                ->get();
        $Dados->UsuarioNome =DB::table('Usuario')
                ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->leftjoin('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->select(
                    'Usuario.UsuarioID',
                    'Usuario.UsuarioNome'
                )
            ->whereNull('UsuarioEscola.UsuarioId')
            ->whereNotIn('Perfil.PerfilCod', ['adm','master'])
            ->get();

        return view('usuarioescola/usuarioescola', compact('Dados'));

    }

    public function create()
    {
        return view('UsuarioEscola.create');
    }

    public function store(UsuarioEscolaCreate $request)
    {
        $validated = $request->validated();

        foreach($request->UsuarioNome as $usuarioID){
            $usuarioescola = new UsuarioEscola;
            $usuarioescola->UsuarioEscolaStatus = $request->UsuarioEscolaStatus;
            $usuarioescola->UsuarioID = $usuarioID;
            $usuarioescola->EscolaID = $request->EscolaID;

            $usuarioescola->save();
        }
        return redirect()->back()
            ->with('status', 'Usuários relacionados a escola com sucesso!');

    }

    public function show()
    {
        return view('myarticlesview');
    }

    public function list(Request $request)
    {
        $PerfilCod = $request->session()->get('PerfilCod');
        $escolaid = $request->session()->get('EscolaID');

        if ($PerfilCod == Perfil::MASTER || $PerfilCod == Perfil::ADMINISTRATIVO){
            $UsuarioEscolas =DB::table('UsuarioEscola')
                ->join('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                ->select(
                    'UsuarioEscola.UsuarioEscolaStatus',
                    'UsuarioEscola.EscolaID',
                    'Escola.Escola'
                )->groupby('Escola.Escola','UsuarioEscola.EscolaID', 'UsuarioEscola.UsuarioEscolaStatus')
                ->get();
        }else{
            $UsuarioEscolas = DB::table('UsuarioEscola')
                ->join('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                ->where('Escola.EscolaID' , $escolaid  )
                ->select(
                    'UsuarioEscola.UsuarioEscolaStatus',
                    'UsuarioEscola.EscolaID',
                    'Escola.Escola'
                )->groupby('Escola.Escola','UsuarioEscola.EscolaID', 'UsuarioEscola.UsuarioEscolaStatus')
                ->get();
        }
        return view('usuarioescola/show', compact('UsuarioEscolas'));
    }

    public function edit($UsuarioEscolaID)
    {
        $UsuarioEscolas['IDS'] =DB::table('UsuarioEscola')
        ->join('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
        ->where('Escola.EscolaID', $UsuarioEscolaID)
        ->select(
            'UsuarioEscola.UsuarioEscolaStatus',
            'UsuarioEscola.UsuarioEscolaDTAtivacao',
            'UsuarioEscola.UsuarioEscolaDTInativacao',
            'UsuarioEscola.UsuarioEscolaDTBloqueio',
            'UsuarioEscola.EscolaID',
            'Escola.Escola'
        )->groupby(
            'UsuarioEscola.UsuarioEscolaStatus',
            'UsuarioEscola.UsuarioEscolaDTAtivacao',
            'UsuarioEscola.UsuarioEscolaDTInativacao',
            'UsuarioEscola.UsuarioEscolaDTBloqueio',
            'UsuarioEscola.EscolaID',
            'Escola.Escola'
        )
        ->get();

        $UsuarioEscolas[] =DB::table('UsuarioEscola')
        ->join('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
        ->join('Usuario','UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
        ->where('Escola.EscolaID', $UsuarioEscolaID)
        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'UsuarioEscola.UsuarioEscolaStatus',
            'UsuarioEscola.UsuarioEscolaDTAtivacao',
            'UsuarioEscola.UsuarioEscolaDTInativacao',
            'UsuarioEscola.UsuarioEscolaDTBloqueio',
            'UsuarioEscola.EscolaID',
            'Escola.Escola',
            'Usuario.UsuarioID',
            'Usuario.UsuarioNome'
        )
        ->get();

        $UsuarioEscolas['Usuarios'] =DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->leftJoin('UsuarioEscola', function ($join) use ($UsuarioEscolaID) {
                $join->on('Usuario.UsuarioID','=','UsuarioEscola.UsuarioID')
                    ->Where('UsuarioEscola.EscolaID', '<>', $UsuarioEscolaID);
            })
            ->select(
                    'Usuario.UsuarioNome',
                    'Usuario.UsuarioStatus',
                    'Usuario.UsuarioLogin',
                    'Perfil.Perfil',
                    'Usuario.UsuarioID'
                )
            ->whereNull('UsuarioEscola.UsuarioId')
            ->whereNotIn('Perfil.PerfilCod', ['adm','master'])
            ->get();
        return view('usuarioescola/editar', compact('UsuarioEscolas'));

    }

    public function update(UsuarioEscolaAlter $request, $id)
    {
        $validated = $request->validated();

        DB::table('UsuarioEscola')->where('EscolaID', $id)->delete();

        if(isset($request->UsuarioID) && count($request->UsuarioID) > 0){
            foreach($request->UsuarioID as $usuarioID){
                $usuarioescola = new UsuarioEscola;
                $usuarioescola->UsuarioEscolaStatus = $request->UsuarioEscolaStatus;
                $usuarioescola->UsuarioID = $usuarioID;
                $usuarioescola->EscolaID = $id;

                $usuarioescola->save();
            }
        }
        return redirect()->action('UsuarioEscolaController@list')
            ->with('status', 'Usuários relacionados a escola com sucesso!');
    }

    public function destroy($id)
    {
        $usuarioescola = UsuarioEscola::findOrFail($id);
        $usuarioescola->delete();
        return redirect()->route('usuarioescola.index')->with('alert-success', 'PerfilTela deletada com sucesso!');
    }
}