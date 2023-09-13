<?php

namespace App\Http\Controllers;

use App\Evento;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\Evento\EventoCreate;
use App\Http\Requests\Evento\EventoAlter;

class EventoController extends Controller
{
    public function index()
    {
        $Usuarios =DB::table('Usuario')
                ->select(
                    'Usuario.UsuarioID',
                    'Usuario.UsuarioNome'
                )
                ->get();
        return view('evento/evento', compact('Usuarios'));
    }

    public function create()
    {
        return view('evento.create');
    }

    public function store(EventoCreate $request)
    {
        $validated = $request->validated();

        $evento = new Evento;
        $evento->UsuarioID = request('UsuarioID');
        $evento->Evento = request('Evento');
        $evento->EventoCod = request('EventoCod');
        $evento->EventoStatus = request('EventoStatus');
        $evento->EventoTipo = request('EventoTipo');
        $evento->save();

        return redirect()->back()
            ->with('status', 'Evento criado com sucesso!');
    }

    public function show()
    {
        $Eventos = new Evento;
        $Eventos = Evento::all();
    }

    public function list()
    {
        $Eventos = new Evento;
        $Eventos = Evento::get();
        return view('evento/show', compact('Eventos'));
    }

    public function edit($EventoID)
    {
        $evento = Evento::findOrFail($EventoID);
        $evento['Usuario'] = DB::table('Usuario')
        ->select(
            'Usuario.UsuarioID',
            'Usuario.UsuarioNome'
        )
        ->get();
        return view('evento/editar', compact('evento'));
    }

    public function update(EventoAlter $request, $id)
    {
        $validated = $request->validated();

        $evento = new Evento;

        $evento = Evento::findOrFail($id);
        $evento->UsuarioID = request('UsuarioID');
        $evento->Evento = request('Evento');
        $evento->EventoCod = request('EventoCod');
        $evento->EventoStatus = request('EventoStatus');
        $evento->EventoTipo = request('EventoTipo');

        if($evento->EventoStatus == 1)
            $evento->EventoDTAtivacao = date('Y-m-d H:i:s');

        if($evento->EventoStatus == 2)
            $evento->EventoDTInativacao = date('Y-m-d H:i:s');

        if($evento->EventoStatus == 3)
            $evento->EventoDTBloqueio = date('Y-m-d H:i:s');

        $evento->save();
        return redirect()->back()
            ->with('status', 'Evento alterado com sucesso!');

    }


}
