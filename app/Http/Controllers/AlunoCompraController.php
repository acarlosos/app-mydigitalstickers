<?php

namespace App\Http\Controllers;

use App\AlunoCompra;
use App\Repository\ExtratoRepository;
use App\UsuarioEscola;
use DB;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\AlunoCompra\AlunoCompraCreate;
use App\Http\Requests\AlunoCompra\AlunoCompraAlter;
use Carbon\Carbon;

class AlunoCompraController extends Controller
{
    public function index(Request $request)
    {

        if($request->session()->get('PerfilCod') == 'master' || $request->session()->get('PerfilCod') == 'adm') {
            $UsuarioEscolas = DB::table('UsuarioEscola')
                ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Escola', 'Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'UsuarioEscola.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Usuario.UsuarioNome'
                )
                ->where('Perfil.PerfilCod', '=', 'al')
                ->get();
        }
        else{
            $UsuarioID = $request->session()->get('UsuarioID');

            $UsuarioEscolas = DB::table('UsuarioEscola')
                ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Escola', 'Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'UsuarioEscola.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Usuario.UsuarioNome'
                )
                ->where('Perfil.PerfilCod', '=', 'al')
                ->where('Usuario.UsuarioID', '=', $UsuarioID)
                ->get();
            $repository = new ExtratoRepository();
            $AlunoCarteiraTot = $repository->saldo( $UsuarioID);
            return view('aluno.compra.index', compact('UsuarioEscolas', 'AlunoCarteiraTot', 'UsuarioID'));
        }
        return view('alunocompra/alunocompra', compact('UsuarioEscolas'));
    }

    public function create()
    {
        return view('alunocompra.create');
    }

    public function store(AlunoCompraCreate $request)
    {
        try{
            $validated = $request->validated();
            $usuario = UsuarioEscola::join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->where('UsuarioEscola.UsuarioEscolaID' , $validated['UsuarioEscolaID'] )->first();
            $saldo = (new ExtratoRepository())->saldo($usuario->UsuarioID);
            if( $validated['AlunoCompraQuantidade']  > $saldo ){
                throw new \Exception("Saldo insuficiente para compra!", 204);
            }
            AlunoCompra::create($validated);
            if($request->session()->get('PerfilCod') == 'al'){
                return view('aluno.compra.success')->with('status', 'Aluno resgatou com sucesso!');
            }
            return redirect()->back()
                ->with('status', 'Aluno resgatou com sucesso!');
        }catch(\Exception $e ) {
            return redirect()->back()
                ->with('erro', 'Saldo insuficiente para compra!')->withInput();
        }
    }

    public function show()
    {
        $AlunoCompras = new AlunoCompra;
        $AlunoCompras = AlunoCompra::all();
    }

    public function list(Request $request)
    {
        if($request->session()->get('PerfilCod') == 'master' || $request->session()->get('PerfilCod') == 'adm') {
            $AlunoCompras = DB::table('AlunoCompra')
                ->join('UsuarioEscola', 'AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
                ->join('Escola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'AlunoCompra.AlunoCompraID',
                    'AlunoCompra.AlunoCompraQuantidade',
                    'AlunoCompra.AlunoCompraStatus',
                    'AlunoCompra.AlunoCompraDTAtivacao',
                    'AlunoCompra.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Usuario.UsuarioNome',
                    'Usuario.UsuarioLogin',
                    'Escola.Escola'
                )
                ->where('Perfil.PerfilCod', '=', 'al')
                ->get();
        }
        else{
            $UsuarioID = $request->session()->get('UsuarioID');
            $AlunoCompras = DB::table('AlunoCompra')
                ->join('UsuarioEscola', 'AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
                ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->join('Escola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->select(
                    'AlunoCompra.AlunoCompraID',
                    'AlunoCompra.AlunoCompraQuantidade',
                    'AlunoCompra.AlunoCompraStatus',
                    'AlunoCompra.AlunoCompraDTAtivacao',
                    'AlunoCompra.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioEscolaID',
                    'UsuarioEscola.UsuarioID',
                    'Usuario.UsuarioNome',
                    'Usuario.UsuarioLogin',
                    'Escola.Escola'
                )
                ->where('Perfil.PerfilCod', '=', 'al')
                ->where('Usuario.UsuarioID', '=', $UsuarioID)
                ->get();
        }
        return view('alunocompra/show', compact('AlunoCompras'));
    }

    public function edit($AlunoCompraID)
    {
        $alunocompra = AlunoCompra::findOrFail($AlunoCompraID);
        $alunocompra['UsuarioEscola'] = DB::table('UsuarioEscola')
        ->join('AlunoCompra','AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
        ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
        ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
        ->select(
            'UsuarioEscola.UsuarioEscolaID',
            'UsuarioEscola.UsuarioID',
            'Usuario.UsuarioNome'
        )
        ->where('AlunoCompra.AlunoCompraID', '=', $AlunoCompraID)
        ->get();

        return view('alunocompra/editar', compact('alunocompra'));
    }

    public function update(AlunoCompraAlter $request, $id)
    {
        try{
            $validated = $request->validated();

            $alunocompra = new AlunoCompra;

            $alunocompra = AlunoCompra::findOrFail($id);

            $alunocompra->UsuarioEscolaID = request('UsuarioEscolaID');
            $alunocompra->AlunoCompraQuantidade = request('AlunoCompraQuantidade');

            $alunocompra->AlunoCompraStatus = request('AlunoCompraStatus');

            if($alunocompra->AlunoCompraStatus == 1)
                $alunocompra->AlunoCompraDTAtivacao = date('Y-m-d H:i:s');

            $alunocompra->save();
            return redirect()->back()->with('status', 'Compra efetuada com sucesso!');
        }catch(Exception $e) {
            return redirect()->back()->withErrors('erro', 'Falha na compra!');
        }
    }
}
