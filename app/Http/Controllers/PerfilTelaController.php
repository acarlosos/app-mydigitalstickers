<?php

namespace App\Http\Controllers;

use App\PerfilTela;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilTela\PerfilTelaCreate;
use App\Http\Requests\PerfilTela\PerfilTelaAlter;


class PerfilTelaController extends Controller
{
    public function index()
    {
        $Dados = new PerfilTela;
        $Dados->PerfilID =DB::table('Perfil')
                ->select(
                    'Perfil.PerfilID',
                    'Perfil.Perfil'
                )
                ->get();
        $Dados->TelaID =DB::table('Tela')
                ->select(
                    'Tela.TelaID',   
                    'Tela.Tela'
                )
                ->where("Tela.TelaStatus",1)
                ->get();
        
        return view('perfiltela/perfiltela', compact('Dados'));

    }

    public function create()
    {
        return view('perfiltela.create');
    }

    public function store(PerfilTelaCreate $request)
    {
        $validated = $request->validated();

        foreach($request->TelaID as $telaID){
            $perfiltela = new PerfilTela;
            $perfiltela->PerfilTelaStatus = $request->PerfilTelaStatus;
            $perfiltela->TelaID = $telaID;
            $perfiltela->PerfilID = $request->PerfilID;

            $perfiltela->save();
        }
        return redirect()->back()
            ->with('status', 'Telas relacionadas com o perfil com sucesso!');
        
    }

    public function show()
    {
        return view('myarticlesview',['articles'=>$articles]);
    }

    public function list()
    {
        $PerfilTelas =DB::table('PerfilTela')
                ->join('Perfil','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
                ->select(
                    'PerfilTela.PerfilTelaStatus',
                    'PerfilTela.PerfilID',
                    'Perfil.Perfil'
                )->groupby('Perfil.Perfil','PerfilTela.PerfilID', 'PerfilTela.PerfilTelaStatus')
                ->get();
        return view('perfiltela/show', compact('PerfilTelas'));
    }

    public function edit($PerfilTelaID)
    {
        $PerfilTelas['IDS'] =DB::table('PerfilTela')
        ->join('Perfil','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
        ->join('Tela','PerfilTela.TelaID', '=', 'Tela.TelaID')
        ->where('Perfil.PerfilID', $PerfilTelaID)
        ->select(
            'PerfilTela.PerfilTelaStatus',
            'PerfilTela.PerfilTelaDTAtivacao',
            'PerfilTela.PerfilTelaDTInativacao',
            'PerfilTela.PerfilTelaDTBloqueio',
            'PerfilTela.PerfilID',
            'Perfil.Perfil'
        )->groupby(
            'PerfilTela.PerfilTelaStatus',
            'PerfilTela.PerfilTelaDTAtivacao',
            'PerfilTela.PerfilTelaDTInativacao',
            'PerfilTela.PerfilTelaDTBloqueio',
            'PerfilTela.PerfilID',
            'Perfil.Perfil'
        )
        ->get();
        $PerfilTelas[] =DB::table('PerfilTela')
        ->join('Perfil','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
        ->join('Tela','PerfilTela.TelaID', '=', 'Tela.TelaID')
        ->where('Perfil.PerfilID', $PerfilTelaID)
        ->select(
            'PerfilTela.PerfilTelaID',
            'PerfilTela.PerfilTelaStatus',
            'PerfilTela.PerfilTelaDTAtivacao',
            'PerfilTela.PerfilTelaDTInativacao',
            'PerfilTela.PerfilTelaDTBloqueio',
            'Tela.TelaID',
            'Tela.Tela',
            'PerfilTela.PerfilID',
            'Perfil.Perfil'
        )
        ->get();
        $PerfilTelas['Telas'] =DB::table('Tela')
                ->select(
                    'Tela.TelaID',
                    'Tela.Tela'
                )
            ->where("Tela.TelaStatus",1)
            ->get();
        return view('perfiltela/editar', compact('PerfilTelas'));
    }

    public function update(PerfilTelaAlter $request, $id)
    {
        $validated = $request->validated();

        DB::table('PerfilTela')->where('PerfilID', $id)->delete();

        if(isset($request->TelaID) && count($request->TelaID) > 0){
            foreach($request->TelaID as $telaID){
                $perfiltela = new PerfilTela;
                $perfiltela->PerfilTelaStatus = $request->PerfilTelaStatus;
                $perfiltela->TelaID = $telaID;
                $perfiltela->PerfilID = $id;

                $perfiltela->save();
            }
        }
        return redirect()->action('PerfilTelaController@list');
    }

    public function destroy($id)
    {
        $perfiltela = PerfilTela::findOrFail($id);
        $perfiltela->delete();
        return redirect()->route('perfiltela.index')->with('alert-success', 'PerfilTela deletada com sucesso!');
    }
}
