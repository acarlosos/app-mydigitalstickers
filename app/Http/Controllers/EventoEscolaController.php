<?php

namespace App\Http\Controllers;


use App\Evento;
use App\EventoEscola;
use App\FaixaEvento;
use App\PontoRecebido;
use App\Repository\ExtratoRepository;
use App\UsuarioEscola;
use DB;
use Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\EventoEscola\EventoEscolaCreate;
use App\Http\Requests\EventoEscola\EventoEscolaAlter;
use App\Http\Requests\EventoEscola\EventoEscolaFaixaCreate;


class EventoEscolaController extends Controller
{
    public function index(Request $request)
    {
        $Dados = new EventoEscola;
        if($request->session()->get('PerfilCod') == 'master' || $request->session()->get('PerfilCod') == 'adm'){
            $Dados->EscolaID =DB::table('Escola')
                ->select(
                    'Escola.EscolaID',
                    'Escola.Escola'
                )
                ->get();
        }
        else{
        $escolaId = $request->session()->get('EscolaID');
            $Dados->EscolaID =DB::table('Escola')
                ->select(
                    'Escola.EscolaID',
                    'Escola.Escola'
                )
                ->where('Escola.EscolaID', '=', $escolaId)
                ->get();
    }
        $Dados->EventoID =DB::table('Evento')
                ->select(
                    'Evento.EventoID',
                    'Evento.Evento'
                )
                ->get();

        return view('eventoescola/eventoescola', compact('Dados'));

    }

    public function create()
    {
        return view('EventoEscola.create');
    }

    public function store(EventoEscolaCreate $request)
    {
        $validated = $request->validated();

        foreach($request->EventoID as $eventoID){
            $eventoescola = new EventoEscola;
            $eventoescola->EventoStatus = 1;
            $eventoescola->EscolaID = $request->EscolaID;
            $eventoescola->EventoID = $eventoID;

            $eventoescola->save();
        }
        return redirect()->back()
            ->with('status', 'Eventos relacionados com o escolas com sucesso!');

    }

    public function show()
    {
        return view('myarticlesview');
    }

    public function list(Request $request)
    {
        if($request->session()->get('PerfilCod') == 'master' || $request->session()->get('PerfilCod') == 'adm'){
            $EventoEscolas =DB::table('EventoEscola')
                ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                ->select(
                    'EventoEscola.EventoStatus',
                    'EventoEscola.EscolaID',
                    'Escola.Escola'
                )->groupby('Escola.Escola','EventoEscola.EscolaID', 'EventoEscola.EventoStatus')
                ->get();
        }
        else{
            $escolaId = $request->session()->get('EscolaID');
            $EventoEscolas =DB::table('EventoEscola')
                ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                ->select(
                    'EventoEscola.EventoStatus',
                    'EventoEscola.EscolaID',
                    'Escola.Escola'
                )->groupby('Escola.Escola','EventoEscola.EscolaID', 'EventoEscola.EventoStatus')
                ->where('Escola.EscolaID', '=', $escolaId)
                ->get();
        }

        return view('eventoescola/show', compact('EventoEscolas'));
    }

    public function edit($EventoEscolaID)
    {
        $EventoEscolas['IDS'] =DB::table('EventoEscola')
        ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
        ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
        ->where('Escola.EscolaID', $EventoEscolaID)
        ->select(
            'EventoEscola.EventoStatus',
            'EventoEscola.EventoID',
            'EventoEscola.EscolaID',
            'Escola.Escola'
        )->groupby(
            'EventoEscola.EventoStatus',
            'EventoEscola.EventoID',
            'EventoEscola.EscolaID',
            'Escola.Escola'
        )
        ->get();

        $EventoEscolas[] =DB::table('EventoEscola')
        ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
        ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
        ->where('Escola.EscolaID', $EventoEscolaID)
        ->select(
            'EventoEscola.EventoEscolaID',
            'EventoEscola.EventoStatus',
            'Evento.EventoID',
            'Evento.Evento',
            'EventoEscola.EscolaID',
            'Escola.Escola'
        )
        ->get();
        $EventoEscolas['Eventos'] =DB::table('Evento')
                ->select(
                    'Evento.EventoID',
                    'Evento.Evento'
                )
                ->get();
        return view('eventoescola/editar', compact('EventoEscolas'));
    }

    public function update(EventoEscolaAlter $request, $id)
    {
        $validated = $request->validated();

        DB::table('EventoEscola')->where('EscolaID', $id)->delete();

        if(isset($request->EventoID) && count($request->EventoID) > 0){
            foreach($request->EventoID as $eventoID){
                $eventoescola = new EventoEscola;
                $eventoescola->EventoStatus = 1;
                $eventoescola->EventoID = $eventoID;
                $eventoescola->EscolaID = $id;

                $eventoescola->save();
            }
        }
        return redirect()->action('EventoEscolaController@list')
            ->with('status', 'Eventos relacionados a escola com sucesso');
    }


    public function eventofaixa($id)
    {
        $EventoEscolas =DB::table('EventoEscola')
            ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->where('Escola.EscolaID', $id)
            ->orderby('Escola.Escola', 'ASC')
            ->orderby('Evento.Evento', 'ASC')
            ->select(
                'EventoEscola.EventoStatus',
                'EventoEscola.EventoEscolaID',
                'Escola.Escola',
                'Evento.Evento',
                'Evento.EventoStatus as Status',

            )
            ->get();
        return view('eventoescola/eventofaixashow', compact('EventoEscolas'));
    }

    public function eventofaixalist($id,$action)
    {
        $FaixasEventoEscolas = DB::table('EventoEscola')
            ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->leftJoin('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
            ->where('EventoEscola.EventoEscolaID', $id)
            ->orderby('Escola.Escola', 'ASC')
            ->orderby('Evento.Evento', 'ASC')
            ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
            ->select(
                'FaixaEvento.FaixaEventoID',
                'FaixaEvento.FaixaEventoStatus',
                'FaixaEvento.FaixaEventoNumIni',
                'FaixaEvento.FaixaEventoNumFim',
                'FaixaEvento.FaixaEventoDTIni',
                'FaixaEvento.FaixaEventoDTFim',
                'EventoEscola.EventoEscolaID',
                'FaixaEvento.FaixaEventoPontoQuantidade',
                'Escola.Escola',
                'Evento.Evento',
                'Evento.EventoTipo'

            )
            ->get();

        return view('eventoescola/faixashow', compact('FaixasEventoEscolas'),['action'=>$action]);
    }

    public function RepasseForm($id,$action)
    {
        $EventoEscola = EventoEscola::find($id);
        $Evento = Evento::find($EventoEscola->EventoID);
        $UsuarioEscolas = DB::table('EventoEscola')
            ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Usuario', 'Usuario.UsuarioID', '=', 'UsuarioEscola.UsuarioID')
            ->join('Perfil', 'Usuario.PerfilID', '=', 'Perfil.PerfilID')
            ->where('EventoEscola.EventoEscolaID', $id)
            ->where('Perfil.PerfilCod', 'al')
            ->select(
                'UsuarioEscola.UsuarioEscolaID',
                'Evento.Evento',
                'Usuario.UsuarioNome',
                'Usuario.UsuarioLogin'

            )
            ->get();

        return view('eventoescola/faixashow', ['action'=>$action,'EventoEscolaID'=>$id],compact('UsuarioEscolas', 'Evento'));
    }

    public function faixaedit($id, $faixaEvento)
    {
        $faixaEvento = FaixaEvento::find($faixaEvento);
        $eventoEscola =DB::table('EventoEscola')
            ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Rede','Rede.RedeID', '=', 'Escola.RedeID')
            ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->where('EventoEscola.EventoEscolaID', $id)
            ->orderby('Escola.Escola', 'ASC')
            ->orderby('Evento.Evento', 'ASC')
            ->select(
                'Escola.Escola',
                'Rede.Rede',
                'EventoEscola.EventoEscolaID',
                'Evento.Evento',
                'Evento.EventoTipo',
            )
            ->first();

        return view('eventoescola/faixaedit', compact('eventoEscola', 'faixaEvento'));
    }


    public function faixanew($id)
    {
        $eventoEscola =DB::table('EventoEscola')
            ->join('Escola','EventoEscola.EscolaID', '=', 'Escola.EscolaID')
            ->join('Rede','Rede.RedeID', '=', 'Escola.RedeID')
            ->join('Evento','EventoEscola.EventoID', '=', 'Evento.EventoID')
            ->where('EventoEscola.EventoEscolaID', $id)
            ->orderby('Escola.Escola', 'ASC')
            ->orderby('Evento.Evento', 'ASC')
            ->select(
                'Escola.Escola',
                'Rede.Rede',
                'EventoEscola.EventoEscolaID',
                'Evento.Evento',
                'Evento.EventoTipo',
            )
            ->first();

        return view('eventoescola/faixanew', compact('eventoEscola'));

    }

    public function faixadelete(Request $request, $id, $faixaEvento)
    {
        $faixaEvento = FaixaEvento::find($faixaEvento)->delete();
        return redirect()->route('eventoescola.faixaslist', [$id, 1])->with('status', 'Faixa deletada com sucesso!');
    }
    public function faixaupdate(Request $request, $id, $faixaEvento)
    {
        $data = $request->all();
        $eventoescolafaixa = FaixaEvento::find($data['id']);
        $eventoEscola = EventoEscola::find($eventoescolafaixa->EventoEscolaID);
        $evento = Evento::find($eventoEscola->EventoID);

        if ( $evento->EventoTipo ) {
            //validar por data
            if(isset($request->FaixaEventoDTIni) && $request->FaixaEventoDTIni != '' && $request->FaixaEventoDTIni) {
                $eventoescolafaixa->FaixaEventoDTIni = Carbon::createFromFormat('Y-m-d', $request->FaixaEventoDTIni)->format('d/m/Y');
            }
            if(isset($request->FaixaEventoDTFim) && $request->FaixaEventoDTFim != '' && $request->FaixaEventoDTFim) {
                $eventoescolafaixa->FaixaEventoDTFim = Carbon::createFromFormat('Y-m-d', $request->FaixaEventoDTFim)->format('d/m/Y');
            }
            $faixas = FaixaEvento::where('EventoEscolaID',$id)->get();
            foreach ($faixas as $key => $value) {
                if ($value->FaixaEventoID !=  $faixaEvento && $value->FaixaEventoDTIni <= $eventoescolafaixa->FaixaEventoDTFim && $value->FaixaEventoDTFim >= $eventoescolafaixa->FaixaEventoDTIni) {
                    $problema = 'Existe sobreposição de intervalo. Intervalo já cadastrado: Inicial '  . $value->FaixaEventoDTIni . ' Final ' .$value->FaixaEventoDTFim;
                    throw new \Exception($problema, 204);
                }
            }
        }else{
            //validar por numero
            if(isset($request->FaixaEventoNumIni) && $request->FaixaEventoNumIni != '' && $request->FaixaEventoNumIni) {
                $eventoescolafaixa->FaixaEventoNumIni = $request->FaixaEventoNumIni;
            }
            if(isset($request->FaixaEventoNumFim) && $request->FaixaEventoNumFim != '' && $request->FaixaEventoNumFim) {
                $eventoescolafaixa->FaixaEventoNumFim = $request->FaixaEventoNumFim;
            }
            $faixas = FaixaEvento::where('EventoEscolaID',$id)->get();
            foreach ($faixas as $key => $value) {
                if ($value->FaixaEventoID !=  $faixaEvento && $value->FaixaEventoNumIni <= $eventoescolafaixa->FaixaEventoNumFim && $value->FaixaEventoNumFim >= $eventoescolafaixa->FaixaEventoNumIni) {
                    $problema = 'Existe sobreposição de intervalo. Intervalo já cadastrado: Inicial '  . $value->FaixaEventoDTIni . ' Final ' .$value->FaixaEventoDTFim;
                    throw new \Exception($problema, 204);
                }
            }
        }
        $eventoescolafaixa->save();
        return redirect()->route('eventoescola.faixaslist', [$id, 1])->with('status', 'Faixa atualizada com sucesso!');
    }

    private function validarSobreposicao($ini1, $fim1 , $ini2, $fim2 )
    {

    }
    public function faixagravar(EventoEscolaFaixaCreate $request, $id)
    {
        try {
            $validated = $request->validated();
            $eventoEscola = EventoEscola::find($id);
            $evento = Evento::find($eventoEscola->EventoID);
            $eventoescolafaixa = new FaixaEvento;
            $problema = '';
            if ( $evento->EventoTipo ) {
                //validar por data
                if(isset($request->FaixaEventoDTIni) && $request->FaixaEventoDTIni != '' && $request->FaixaEventoDTIni) {
                    $eventoescolafaixa->FaixaEventoDTIni = Carbon::createFromFormat('Y-m-d', $request->FaixaEventoDTIni)->format('d/m/Y');
                }
                if(isset($request->FaixaEventoDTFim) && $request->FaixaEventoDTFim != '' && $request->FaixaEventoDTFim) {
                    $eventoescolafaixa->FaixaEventoDTFim = Carbon::createFromFormat('Y-m-d', $request->FaixaEventoDTFim)->format('d/m/Y');
                }
                $faixas = FaixaEvento::where('EventoEscolaID',$id)->get();
                foreach ($faixas as $key => $value) {
                    if ($value->FaixaEventoDTIni <= $eventoescolafaixa->FaixaEventoDTFim && $value->FaixaEventoDTFim >= $eventoescolafaixa->FaixaEventoDTIni) {
                        $problema = 'Existe sobreposição de intervalo. Intervalo já cadastrado: Inicial '  . $value->FaixaEventoDTIni . ' Final ' .$value->FaixaEventoDTFim;
                        throw new \Exception($problema, 204);
                    }
                }
            }else{
                //validar por numero
                if(isset($request->FaixaEventoNumIni) && $request->FaixaEventoNumIni != '' && $request->FaixaEventoNumIni) {
                    $eventoescolafaixa->FaixaEventoNumIni = $request->FaixaEventoNumIni;
                }
                if(isset($request->FaixaEventoNumFim) && $request->FaixaEventoNumFim != '' && $request->FaixaEventoNumFim) {
                    $eventoescolafaixa->FaixaEventoNumFim = $request->FaixaEventoNumFim;
                }
                $faixas = FaixaEvento::where('EventoEscolaID',$id)->get();
                foreach ($faixas as $key => $value) {
                    if ($value->FaixaEventoNumIni <= $eventoescolafaixa->FaixaEventoNumFim && $value->FaixaEventoNumFim >= $eventoescolafaixa->FaixaEventoNumIni) {
                        $problema = 'Existe sobreposição de intervalo. Intervalo já cadastrado: Inicial '  . $value->FaixaEventoNumIni . ' Final ' .$value->FaixaEventoNumFim;
                        throw new \Exception($problema, 204);
                    }
                }
            }

            $eventoescolafaixa->FaixaEventoPontoQuantidade = $request->FaixaEventoPontoQuantidade;
            $eventoescolafaixa->EventoEscolaID = $id;
            $eventoescolafaixa->save();
            return redirect()->route('eventoescola.faixaslist', [$id, 1])->with('status', 'Faixa Criada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('erro', $e->getMessage());
        }
    }

    public function faixagravarimport(Request $request, $id)
    {
        try{
            $count = 0;
            $erros = 0;
            // 1 data
            $MsgSucesso = 'registros Importados!';
            $MsgErro = 'Matriculas inexistentes ou parametros fora da faixa (';

            if ($request->file('importcsv')->isValid()) {

                $lines = Excel::toArray([],$request->file('importcsv')->store('files'));
                // Recupera a extension do arquivo
                $extension = $request->importcsv->getClientMimeType();
                if($extension != "xls" && $extension != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                    return redirect()
                        ->back()
                        ->with('erro', 'O Formato do Arquivo deve ser .XLS ou XLSX');
                foreach($lines[0] as $key => $line )
                {
                    if($key == 0 || $line[0] == null){
                        continue;
                    }
                    $matricula = '';
                    if($request->EventoTipo){
                        //Data
                        $end =  strpos($line[1] , '-');
                        $matricula = substr($line[1], 0 , $end);
                        $FaixaEventoEscola = DB::table('EventoEscola')
                            ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                            ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                            ->join('Usuario', 'UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
                            ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                            ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
                            ->Join('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
                            ->where('EventoEscola.EventoEscolaID', $id)
                            ->where('Usuario.UsuarioMatricula', $matricula)
                            ->where('Perfil.PerfilCod', 'al')
                            ->where('FaixaEvento.FaixaEventoDTFim', '>=', $line[0])
                            ->where('FaixaEvento.FaixaEventoDTIni', '<=', $line[0])
                            ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
                            ->select(
                                'UsuarioEscola.UsuarioEscolaID',
                                'FaixaEvento.FaixaEventoID',
                                'FaixaEvento.FaixaEventoPontoQuantidade'
                            )->limit(1)
                            ->get();
                    }else{
                        //Ponto
                        $end =  strpos($line[2] , '-');
                        $matricula = substr($line[2], 0 , $end);
                        $FaixaEventoEscola = DB::table('EventoEscola')
                            ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                            ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                            ->join('Usuario', 'UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
                            ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                            ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
                            ->Join('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
                            ->where('EventoEscola.EventoEscolaID', $id)
                            ->where('Usuario.UsuarioMatricula', $matricula)
                            ->where('Perfil.PerfilCod', 'al')
                            ->where('FaixaEvento.FaixaEventoNumFim', '>=', $line[1])
                            ->where('FaixaEvento.FaixaEventoNumIni', '<=', $line[1])
                            ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
                            ->select(
                                'UsuarioEscola.UsuarioEscolaID',
                                'FaixaEvento.FaixaEventoID',
                                'FaixaEvento.FaixaEventoPontoQuantidade'
                            )->limit(1)
                            ->get();
                    }
                    if(isset($FaixaEventoEscola) && count($FaixaEventoEscola)>0) {
                        foreach ($FaixaEventoEscola as $dados) {
                            if ($dados->UsuarioEscolaID > 0 && $dados->FaixaEventoID > 0
                                && $dados->FaixaEventoPontoQuantidade > 0) {
                                $count++;
                                $PontoRecebido = new PontoRecebido;
                                $PontoRecebido->UsuarioEscolaID = $dados->UsuarioEscolaID;
                                $PontoRecebido->FaixaEventoID = $dados->FaixaEventoID;
                                $PontoRecebido->PontoRecebidoQuantidade = $dados->FaixaEventoPontoQuantidade;
                                $PontoRecebido->PontoRecebidoStatus = 1;
                                $PontoRecebido->save();
                                $dados = null;
                            }
                            $count++;
                        }
                    }else{
                        $MsgErro .=  $matricula  . ', ';
                        $erros++;
                    }


                }
            }
            $MsgErro .=  ' )' ;
            if($erros){
                return redirect()->back()->with('status', $MsgErro);
            }
            return redirect()->back()->with('status', $count . ' '. $MsgSucesso);
        }catch(\Exception $e){
            return redirect()->back()->with('error', $MsgErro);
        }
    }

    public function modelodata()
    {
        $file= public_path() .  '/download/modelo_evento_data.xlsx';
        return response()->download($file, 'modelo_evento_data.xlsx');
    }
    public function modelonumero()
    {
        $file= public_path() .  '/download/modelo_evento_numero.xlsx';
        return response()->download($file, 'modelo_evento_numero.xlsx');
    }

    public function faixagravarmanual(Request $request, $id)
    {
        $UsuarioID = session()->get('UsuarioID');
        $valor = '';
        $msg = '';
        $repo = new ExtratoRepository();
        $usuarioEscola = UsuarioEscola::where('UsuarioEscolaID', $request->UsuarioEscolaID)->first();
        $saldo = $repo->saldoEscola($usuarioEscola->EscolaID);
        if(floatval($request->ponto) > floatval($saldo)){
            $msg = ' Saldo da escola negativo.';
        }
        if (isset($request->Ponto) && $request->Ponto>0){
            $valor = $request->Ponto;
            $FaixaEventoEscola = DB::table('EventoEscola')
                ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                ->join('Usuario', 'UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
                ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
                ->Join('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
                ->where('EventoEscola.EventoEscolaID', $id)
                ->where('UsuarioEscola.UsuarioEscolaID', $request->UsuarioEscolaID)
                ->where('Perfil.PerfilCod', 'al')
                ->where('FaixaEvento.FaixaEventoNumFim', '>=', $request->Ponto)
                ->where('FaixaEvento.FaixaEventoNumIni', '<=', $request->Ponto)
                ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
                ->select(
                    'UsuarioEscola.UsuarioEscolaID',
                    'FaixaEvento.FaixaEventoID',
                    'FaixaEvento.FaixaEventoPontoQuantidade'
                )->limit(1)
                ->get();
        }else {
            if (isset($request->DT) && $request->DT != '') {
                $valor = Carbon::createFromDate($request->DT)->format('d/m/Y');
                $FaixaEventoEscola = DB::table('EventoEscola')
                    ->join('Escola', 'EventoEscola.EscolaID', '=', 'Escola.EscolaID')
                    ->join('UsuarioEscola', 'UsuarioEscola.EscolaID', '=', 'Escola.EscolaID')
                    ->join('Usuario', 'UsuarioEscola.UsuarioID', '=', 'Usuario.UsuarioID')
                    ->join('Perfil', 'Perfil.PerfilID', '=', 'Usuario.PerfilID')
                    ->join('Evento', 'EventoEscola.EventoID', '=', 'Evento.EventoID')
                    ->Join('FaixaEvento', 'EventoEscola.EventoEscolaID', '=', 'FaixaEvento.EventoEscolaID')
                    ->where('EventoEscola.EventoEscolaID', $id)
                    ->where('UsuarioEscola.UsuarioEscolaID', $request->UsuarioEscolaID)
                    ->where('Perfil.PerfilCod', 'al')
                    ->where('FaixaEvento.FaixaEventoDTFim', '>=', $request->DT)
                    ->where('FaixaEvento.FaixaEventoDTIni', '<=', $request->DT)
                    ->orderby('FaixaEvento.FaixaEventoPontoQuantidade', 'ASC')
                    ->select(
                        'UsuarioEscola.UsuarioEscolaID',
                        'FaixaEvento.FaixaEventoID',
                        'FaixaEvento.FaixaEventoPontoQuantidade'
                    )->limit(1)
                    ->get();
            }
        }
        if(isset($FaixaEventoEscola) && count($FaixaEventoEscola)>0) {
            foreach ($FaixaEventoEscola as $dados) {
                if ($dados->UsuarioEscolaID > 0 && $dados->FaixaEventoID > 0
                    && $dados->FaixaEventoPontoQuantidade > 0) {
                    $PontoRecebido = new PontoRecebido;
                    $PontoRecebido->UsuarioEscolaID = $dados->UsuarioEscolaID;
                    $PontoRecebido->FaixaEventoID = $dados->FaixaEventoID;
                    $PontoRecebido->PontoRecebidoQuantidade = $dados->FaixaEventoPontoQuantidade;
                    $PontoRecebido->PontoRecebidoStatus = 1;
                    $PontoRecebido->UsuarioID = $UsuarioID;
                    $PontoRecebido->save();
                }
            }
        }
        else{
            return redirect()->back()
                ->with('erro', 'Parâmetro ' . $valor . ' informado não incluído nas faixas cadastradas')->withInput();
        }
        return redirect()->back()
            ->with('status', 'Repasse realizado!' . $msg);
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
            ->where('Tela.Tela', '=', 'administrarfaixaevento')
            ->get();

        //dd($Menu,$request->session()->get('UsuarioEmail'));

        return $AcessoCad;
    }

    public function permissaoAcessoA($request){

        $AcessoCad = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('PerfilTela','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
            ->leftjoin('Tela','Tela.TelaID', '=', 'PerfilTela.TelaID')
            ->where('Usuario.UsuarioID', '=', $request->session()->get('UsuarioID'))
            ->select(
                'Tela.Tela'
            )
            ->where('Tela.Tela', '=', 'administrarfaixaeventonew')
            ->get();

        //dd($Menu,$request->session()->get('UsuarioEmail'));

        return $AcessoCad;
    }

    public function permissaoAcessoEventoEscola($request){

        $AcessoCad = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('PerfilTela','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
            ->leftjoin('Tela','Tela.TelaID', '=', 'PerfilTela.TelaID')
            ->where('Usuario.UsuarioID', '=', $request->session()->get('UsuarioID'))
            ->select(
                'Tela.Tela'
            )
            ->where('Tela.Tela', '=', 'cadeventoescola')
            ->get();

        //dd($Menu,$request->session()->get('UsuarioEmail'));

        return $AcessoCad;
    }

    public function permissaoAcessoPontoManual($request){

        $AcessoCad = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('PerfilTela','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
            ->leftjoin('Tela','Tela.TelaID', '=', 'PerfilTela.TelaID')
            ->where('Usuario.UsuarioID', '=', $request->session()->get('UsuarioID'))
            ->select(
                'Tela.Tela'
            )
            ->where('Tela.Tela', '=', 'repassedepontosmanual')
            ->get();

        //dd($Menu,$request->session()->get('UsuarioEmail'));

        return $AcessoCad;
    }

    public function permissaoAcessoPontoArquivo($request){

        $AcessoCad = DB::table('Usuario')
            ->join('Perfil','Perfil.PerfilID', '=', 'Usuario.PerfilID')
            ->join('PerfilTela','PerfilTela.PerfilID', '=', 'Perfil.PerfilID')
            ->leftjoin('Tela','Tela.TelaID', '=', 'PerfilTela.TelaID')
            ->where('Usuario.UsuarioID', '=', $request->session()->get('UsuarioID'))
            ->select(
                'Tela.Tela'
            )
            ->where('Tela.Tela', '=', 'repassedepontosarquivo')
            ->get();

        //dd($Menu,$request->session()->get('UsuarioEmail'));

        return $AcessoCad;
    }
}
