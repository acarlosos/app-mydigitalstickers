<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $Menu = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('PerfilTela','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
            ->leftjoin('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->leftjoin('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->leftjoin('Tela','Tela.TelaID', '=', 'PerfilTela.TelaID')
            ->where('Usuario.UsuarioID', '=', $request->session()->get('UsuarioID'))
            ->select(
                'Tela.Tela'
                ,'Usuario.UsuarioNome'
                ,'Escola.Escola'
                ,'Perfil.Perfil'
            )
            ->orderBy('Tela.TelaOrdem')
            ->get();

        if($request->session()->get('Perfil') == 'Aluno'){
            return view('aluno.index', compact('Menu'));
        }
        return view('home', compact('Menu'));
    }

    public function telasLiberadas($request)
    {
        $Menu = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('PerfilTela','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
            ->leftjoin('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->leftjoin('Escola','Escola.EscolaID', '=', 'UsuarioEscola.EscolaID')
            ->leftjoin('Tela','Tela.TelaID', '=', 'PerfilTela.TelaID')
            ->where('Usuario.UsuarioID', '=', $request->session()->get('UsuarioID'))
            ->select(
                'Tela.Tela'
                ,'Usuario.UsuarioNome'
                ,'Escola.Escola'
                ,'Perfil.Perfil'
            )
            ->orderBy('Tela.TelaOrdem')
            ->get();


        return $Menu;
    }
}
