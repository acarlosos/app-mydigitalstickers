<?php

namespace App\Http\Controllers;

use App\Escola;
use App\Imports\ImportUsuario;
use App\Perfil;
use App\Usuario;
use App\UsuarioEscola;
use DB;
use Excel;
use Illuminate\Http\Request;
use App\Http\Requests\Usuario\UsuarioCreate;
use App\Http\Requests\Usuario\UsuarioAlter;
use App\Http\Requests\Usuario\UsuarioAlterAluno;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $notIn = [];
        $PerfilCod = $request->session()->get('PerfilCod');
        $EscolaID = $request->session()->get('EscolaID');
        $Escola = Escola::find($EscolaID);
        $Escolas = Escola::all();
        switch ($PerfilCod) {
            case Perfil::MASTER:
                break;
            case Perfil::ADMINISTRATIVO:
                $notIn = [Perfil::MASTER];
                break;
            case Perfil::GESTOR_ESCOLA:
                $notIn = [Perfil::MASTER, Perfil::ADMINISTRATIVO];
                break;
            case Perfil::SECRET_ESCOLA:
                $notIn = [Perfil::MASTER, Perfil::ADMINISTRATIVO, Perfil::GESTOR_ESCOLA];
                break;
            default:
                $notIn = [ Perfil::MASTER, Perfil::ADMINISTRATIVO, Perfil::GESTOR_ESCOLA, Perfil::ALUNO, Perfil::PROFESSOR];
                break;
        }

        $Perfis = Perfil::whereNotIn('PerfilCod', $notIn)->get();
        return view('usuario/usuario', compact('Perfis', 'Escola', 'Escolas'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    private function checkimport($data)
    {
        if(isset($data['UsuarioLogin']) && Usuario::where('UsuarioLogin' , $data['UsuarioLogin'])->first()){
            return "O login: " . $data['UsuarioLogin'] . " já existe na plataforma. " ;
        }
        if(isset($data['UsuarioMatricula']) && isset($data['EscolaID'])){
            $usuario = Usuario::leftJoin('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->leftJoin('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                ->where('Escola.EscolaID' , $data['EscolaID'])
                ->where('Usuario.UsuarioMatricula' , $data['UsuarioMatricula'])
                ->first();
            if($usuario){
                return "Matricula: " . $data['UsuarioMatricula'] . " já existe na escola.";
            }
        }

        return false;
    }
    private function validUser($data , $usuario = null )
    {
        if(isset($data['UsuarioLogin'])  ){
            if(is_null($usuario) && Usuario::where('UsuarioLogin' , $data['UsuarioLogin'])->first()){
                throw new \Exception("Login já existe em nosso sistema", 204);
            }else{
                if(Usuario::where('UsuarioLogin' , $data['UsuarioLogin'])->first()->UsuarioID != $usuario->UsuarioID ){
                    throw new \Exception("Login já existe em nosso sistema", 204);
                }
            }
        }
        if(isset($data['UsuarioMatricula']) && isset($data['EscolaID'])){
            $user = Usuario::leftJoin('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
                ->leftJoin('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                ->where('Escola.EscolaID' , $data['EscolaID'])
                ->where('Usuario.UsuarioMatricula' , $data['UsuarioMatricula'])
                ->first();
            if(is_null($usuario)){
                if($user){
                    throw new \Exception("Matricula já existe na escola.", 204);
                }
            }else{
                if($user->UsuarioID != $usuario->UsuarioID){
                    throw new \Exception("Matricula já existe na escola.", 204);
                }

            }
        }

    }

    public function store(UsuarioCreate $request)
    {
        try {
            $validated = $request->validated();
            $perfil = Perfil::find($validated['PerfilID']);
            if($perfil->PerfilCod == Perfil::ALUNO){
                $this->validUser($validated);
            }

            $validated['UsuarioSenha'] = sha1($validated['UsuarioSenha']);
            if(isset( $validated['UsuarioCelular'] ) &&  $validated['UsuarioCelular']){
                $validated['UsuarioCelular'] = str_replace(["(",")"," ","-"],'', $validated['UsuarioCelular']);
            }


            $usuario = Usuario::create($validated);
            //*****Escola Usuario*****

            if(!in_array($perfil->PerfilCod, ['adm', 'master'])) {
                $usuarioescola = new UsuarioEscola;
                $usuarioescola->UsuarioEscolaStatus = 1;
                $usuarioescola->UsuarioID = $usuario->UsuarioID;
                $usuarioescola->EscolaID = $validated['EscolaID'];
                $usuarioescola->save();
            }

            return redirect()->route('usuario.list')
                ->with('status', 'Usuário criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

    public function show()
    {
        $Usuarios = new Usuario;
        $Usuarios = Usuario::all();
    }

    public function importar(Request $request)
    {
        $escolaid = $request->session()->get('EscolaID');
        $Escola = Escola::find($escolaid);
        $Escolas = Escola::all();
        return view('usuario.importar', compact('Escola' , 'Escolas'));
    }
    public function download()
    {
        $file= public_path() .  '/download/modelo_cadastro_alunos.xlsx';
        return response()->download($file, 'modelo_cadastro_alunos.xlsx');
    }
    public function importarGravar(Request $request)
    {
        try {
            $erros = [];
            $data = $request->all();
            $lines = Excel::toArray([],$request->file('importcsv')->store('files'));

            if ($request->file('importcsv')->isValid()) {
                // Recupera a extension do arquivo
                $extension = $request->importcsv->getClientMimeType();
                if($extension != "xls" && $extension != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                    return redirect()
                        ->back()
                        ->with('erro', 'O Formato do Arquivo deve ser .XLS ou XLSX');
                $count = 0;
                foreach($lines[0] as $key => $line )
                {
                    $matricula = '';
                    if ( !isset($line[3]) ){
                        continue;
                    }

                    $end =  strpos($line[3] , '-');
                    $matricula = substr($line[3], 0 , $end);

                    $nome = explode(' ', $line[0]);
                    $login = reset($nome) . end($nome);

                    $attributs = [];
                    $attributs['UsuarioLogin'] = strtolower($login);
                    $attributs['UsuarioNome'] = $line[0];
                    $attributs['UsuarioEmail'] = $line[2];
                    $attributs['UsuarioMatricula'] =  $matricula ;
                    $attributs['UsuarioCelular'] =  $line[1] ? str_replace(["(",")"," ","-"],'', $line[1])  : 0;
                    $attributs['PerfilID'] = 1;
                    $attributs['UsuarioStatus'] = 1;
                    $attributs['EscolaID'] = $data['EscolaID'];
                    $attributs['UsuarioSenha'] = sha1('NOVA@1234') ;

                    $cheeck = $this->checkimport($attributs);

                    if($cheeck ){
                        $erros[$key] = "O login: " . $attributs['UsuarioLogin'] . " já existe na plataforma. ";
                        continue;
                    }
                    $usuario = Usuario::create( $attributs);
                    $usuarioescola = UsuarioEscola::create(
                        [
                            'UsuarioEscolaStatus' => $usuario->UsuarioStatus,
                            'UsuarioID' => $usuario->UsuarioID,
                            'EscolaID' => $data['EscolaID'],
                        ]
                    );
                    $count++;
                }
            }
            if(count($erros)){
                return redirect()->back()->with('erroslist', $erros);
            }
            return redirect()->route('usuario.importar')->with('status', "{$count} usuário(s) cadatrado(s) com sucesso!");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('erro', 'Falha ao importar os alunos, confira a estrutura do arquivo utilizado.');
        }
    }
    public function list(Request $request)
    {
        $PerfilCod = $request->session()->get('PerfilCod');
        $escolaid = $request->session()->get('EscolaID');
        $usuarioid = $request->session()->get('UsuarioID');
        $notIn = [];
        switch ($PerfilCod) {
            case Perfil::MASTER:
                break;
            case Perfil::ADMINISTRATIVO:
                $notIn = [Perfil::MASTER];
                break;
            case Perfil::GESTOR_ESCOLA:
                $notIn = [Perfil::MASTER, Perfil::ADMINISTRATIVO];
                break;
            case Perfil::SECRET_ESCOLA:
                $notIn = [Perfil::MASTER, Perfil::ADMINISTRATIVO, Perfil::GESTOR_ESCOLA];
                break;
            default:
                $notIn = [ Perfil::MASTER, Perfil::ADMINISTRATIVO, Perfil::GESTOR_ESCOLA, Perfil::ALUNO, Perfil::PROFESSOR];
                break;
        }

        $Usuarios = DB::table('Usuario')
            ->join('Perfil','Usuario.PerfilID', '=', 'Perfil.PerfilID')
            ->leftJoin('UsuarioEscola','Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->leftJoin('Escola','UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
            ->select(
                'Usuario.UsuarioID',
                'Usuario.UsuarioNome',
                'Usuario.UsuarioLogin',
                'Usuario.UsuarioStatus',
                'Usuario.UsuarioDTAtivacao',
                'Usuario.UsuarioDTInativacao',
                'Usuario.UsuarioDTBloqueio',
                'Usuario.UsuarioCelular',
                'Usuario.UsuarioEmail',
                'Usuario.UsuarioMatricula',
                'Usuario.PerfilID',
                'Perfil.PerfilCod',
                'Perfil.Perfil',
                'Escola.Escola',
            );
        if(  $PerfilCod  == 'master'){
            $Usuarios = $Usuarios->get();
        }elseif($PerfilCod  == 'adm' ){
            $Usuarios = $Usuarios->where('Perfil.PerfilCod','<>','master')->get();
        }elseif($PerfilCod  == 'gestor_escola') {
            $Usuarios = $Usuarios->where('UsuarioEscola.EscolaID','=',$escolaid)
            ->whereNotIn('Perfil.PerfilCod',$notIn )->get();
        }elseif( $PerfilCod  == 'secret_escola'  ){
            $Usuarios = $Usuarios->where('UsuarioEscola.EscolaID','=',$escolaid)
            ->whereNotIn('Perfil.PerfilCod',$notIn )->get();
        }else{
            $Usuarios = $Usuarios->where('Usuario.UsuarioID','=',$usuarioid)->get();
        }
        return view('usuario/show', compact('Usuarios'));
    }

    public function edit($UsuarioID, Request $request)
    {
        $usuario = Usuario::findOrFail($UsuarioID);

        if($request->session()->get('PerfilCod') != 'adm' && $request->session()->get('PerfilCod') != 'master'){
            $usuario['Perfil'] =DB::table('Perfil')
                ->select(
                    'Perfil.PerfilID',
                    'Perfil.Perfil'
                )
                ->whereNotIn('Perfil.PerfilCod', ['adm','master'])
                ->get()
            ;

            if($request->session()->get('PerfilCod') == 'al'){
                return view('aluno.usuario.edit', compact('usuario'));
            }
        }
        else{
            $usuario['Perfil'] =DB::table('Perfil')
                ->select(
                    'Perfil.PerfilID',
                    'Perfil.Perfil'
                )
                ->get()
            ;

        }

        return view('usuario/editar', compact('usuario'));
    }

    public function editaraluno($UsuarioID)
    {
        $usuario = Usuario::findOrFail($UsuarioID);
        return view('usuario/editaraluno', compact('usuario'));


    }

    public function updatealuno(UsuarioAlterAluno $request, $id)
    {
        try {
            $validated = $request->validated();
            $usuario = new Usuario;

            $usuario = Usuario::findOrFail($id);

            if(isset($request->UsuarioSenha) && $request->UsuarioSenha){
                $usuario->UsuarioSenha = sha1(request('UsuarioSenha'));
            }
            $data = $request->all();
            if(isset($data['UsuarioCelular']) ){
                $usuario->UsuarioCelular = str_replace(["(",")"," ","-"],'', $data['UsuarioCelular'] );
            }
            if(isset($data['UsuarioEmail']) ){
                $usuario->UsuarioEmail = $data['UsuarioEmail'];
            }

            // Define o valor default para a vari�vel que cont�m o nome da imagem
            $nameFile = null;


            if ($request->hasFile('image') && $request->file('image')->isValid()) {

                // Define um aleat�rio para o arquivo baseado no timestamps atual
                $name = 'usuario'.$id;

                $extension = $request->image->extension();

                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";

                // Faz o upload:
                $request->image->move(public_path('usuarios'), $nameFile);
                $usuario->UsuarioFoto = 'usuarios/' . $nameFile;
            }

            $usuario->save();
            return redirect()->back()
                ->with('status', 'Usuário alterado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }

    }

    public function update(UsuarioAlter $request, $id)
    {

        try {
            $data = $request->validated();
            $usuario = Usuario::findOrFail($id);
            $perfil = Perfil::where('PerfilID' , $usuario->PerfilID)->first();

            if($perfil->PerfilCod == Perfil::ALUNO){
                $this->validUser($data, $usuario);
            }

            if(isset($data['UsuarioSenha'])){
                if(isset($data['UsuarioSenhaConfirm'])) {
                    if($data['UsuarioSenha'] == $data['UsuarioSenhaConfirm']){
                        $data['UsuarioSenha'] = sha1(request('UsuarioSenha'));
                    }else{
                        return redirect()->back()->withInput()->withErrors('As senhas precisam ser iguais');
                    }
                }else{
                    $data['UsuarioSenha'] = sha1(request('UsuarioSenha'));
                }
            }else{
                unset($data['UsuarioSenha']);
            }

            if(isset($data['UsuarioCelular']) ){
                $data['UsuarioCelular'] = str_replace(["(",")"," ","-"],'', $data['UsuarioCelular'] );
            }

            switch ($data['UsuarioStatus']) {
                case 1:
                    $data['UsuarioDTAtivacao'] = now();
                    break;
                case 2:
                    $data['UsuarioDTInativacao'] = now();
                    break;
                case 3:
                    $data['UsuarioDTBloqueio'] = now();
                    break;
            }
            if( $request->has('UsuarioFoto')  ){
                $imageName = $id.'.'.$request->UsuarioFoto->extension();
                $request->UsuarioFoto->move(public_path('images/profile'), $imageName);
                $data['UsuarioFoto'] = '/images/profile/' . $imageName;
            }
            $usuario->update($data);
            return redirect()->back()->with('status', 'Usuário alterado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }

    }

    public function permissaoAcesso($request){

        $AcessoCad = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('PerfilTela','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
            ->leftjoin('Tela','Tela.TelaID', '=', 'PerfilTela.TelaID')
            ->where('Usuario.UsuarioID', '=', $request->session()->get('UsuarioID'))
            ->select(
                'Tela.Tela'
            )
            ->where('Tela.Tela', '=', 'cadusuario')
            ->get();

        //dd($Menu,$request->session()->get('UsuarioEmail'));

        return $AcessoCad;
    }


}
