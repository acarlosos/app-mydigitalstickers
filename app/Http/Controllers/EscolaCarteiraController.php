<?php

namespace App\Http\Controllers;

use App\Escola;
use App\PontoRecebido;
use App\Usuario;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;


class EscolaCarteiraController extends Controller
{
    public function index(Request $request)
    {

        $EscolaID = $request->has('EscolaID')  ? $request->EscolaID : session()->get('EscolaID');
        $EscolaPonto =DB::table('Ponto')
            ->join('UsuarioEscola','Ponto.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->select(
                DB::raw("Concat('Gerado') as Action")
                ,'Escola.Escola as Nome'
                ,'Ponto.PontoQuantidade as QTD'
                ,'Ponto.PontoDTAtivacao as DT'
                ,'Usuario.UsuarioNome as Aluno'
                ,DB::raw("Concat('-') as Evento")
                ,'Usuario.UsuarioID as UsuarioID'
            )
            ->where('Perfil.PerfilCod', '<>', 'al')
            ->where('Escola.EscolaID', '=', $EscolaID)
            ->where('Ponto.PontoStatus',1);

        $EscolaAlunoCarteiraRecebido =DB::table('PontoRecebido')
            ->join('UsuarioEscola','PontoRecebido.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Usuario as Gerador','Gerador.UsuarioID', '=', 'PontoRecebido.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->join('FaixaEvento','FaixaEvento.FaixaEventoID', '=', 'PontoRecebido.FaixaEventoID')
            ->join('EventoEscola','EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
            ->join('Evento','Evento.EventoID', '=', 'EventoEscola.EventoID')
            ->select(
                DB::raw("Concat('Repasse') as Action")
                ,'Escola.Escola as Nome'
                ,'PontoRecebido.PontoRecebidoQuantidade as QTD'
                ,'PontoRecebido.PontoRecebidoDTAtivacao as DT'
                ,'Usuario.UsuarioNome as Aluno'
                ,'Evento.Evento as Evento'
                ,'Gerador.UsuarioNome as UsuarioID'
            )
            ->where('Perfil.PerfilCod', '=', 'al')
            ->where('Escola.EscolaID', '=', $EscolaID)
            ->where('PontoRecebido.PontoRecebidoStatus',1);

        $EscolaAlunoCarteira =DB::table('AlunoCompra')
            ->join('UsuarioEscola','AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->select(
                DB::raw("Concat('Compra') as Action")
                ,'Escola.Escola as Nome'
                ,'AlunoCompra.AlunoCompraQuantidade as QTD'
                ,'AlunoCompra.AlunoCompraDTAtivacao as DT'
                ,'Usuario.UsuarioNome as Aluno'
                ,DB::raw("Concat('-') as Evento")
                ,'Usuario.UsuarioID as UsuarioID'
            )
            ->where('Perfil.PerfilCod', '=', 'al')
            ->where('AlunoCompra.AlunoCompraStatus',1)
            ->where('Escola.EscolaID', '=', $EscolaID)
            ->union($EscolaAlunoCarteiraRecebido)
            ->union($EscolaPonto)
            ->orderby('DT', 'DESC')
            ->get();

        $EscolaPontoSum =DB::table('Ponto')
            ->join('UsuarioEscola','Ponto.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->select(
                DB::raw("coalesce(SUM(Ponto.PontoQuantidade),0) as qtd")

            )
            ->where('Perfil.PerfilCod', '<>', 'al')
            ->where('Escola.EscolaID', '=', $EscolaID)
            ->where('Ponto.PontoStatus',1)
            ->get();

        $EscolaAlunoCarteiraRecSum =DB::table('PontoRecebido')
            ->join('UsuarioEscola','PontoRecebido.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->select(
                DB::raw("coalesce(SUM(PontoRecebido.PontoRecebidoQuantidade),0) as qtd")
            )
            ->where('Perfil.PerfilCod', '=', 'al')
            ->where('Escola.EscolaID', '=', $EscolaID)
            ->where('PontoRecebido.PontoRecebidoStatus',1)
            ->get();

        $EscolaAlunoCarteiraComSum =DB::table('AlunoCompra')
            ->join('UsuarioEscola','AlunoCompra.UsuarioEscolaID', '=', 'UsuarioEscola.UsuarioEscolaID')
            ->join('Usuario','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->select(
                DB::raw("coalesce(SUM(AlunoCompra.AlunoCompraQuantidade),0) as qtd")
            )
            ->where('Perfil.PerfilCod', '=', 'al')
            ->where('Escola.EscolaID', '=', $EscolaID)
            ->where('AlunoCompra.AlunoCompraStatus',1)
            ->get();

        $EscolaAlunoCarteiraTot = ((int)$EscolaAlunoCarteiraComSum[0]->qtd + (int)$EscolaPontoSum[0]->qtd) - (int)$EscolaAlunoCarteiraRecSum[0]->qtd;
        $Escolas = Escola::all();
        return view('carteira/escolacarteira', compact('EscolaAlunoCarteira', 'EscolaAlunoCarteiraTot', 'Escolas', 'EscolaID'));
    }

}
