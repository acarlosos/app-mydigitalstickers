<?php

namespace App\Http\Controllers;

use App\Tela;
use Illuminate\Http\Request;
use App\Http\Requests\Tela\TelaCreate;
use App\Http\Requests\Tela\TelaAlter;

class TelaController extends Controller
{
    public function index()
    {
        $tela = Tela::orderBy('TelaDTAtivacao', 'desc')->paginate(10);
        return view('tela/tela', ['tela' => $tela]);
    }

    public function create()
    {
        return view('tela.create');
    }

    public function store(TelaCreate $request)
    {
        $validated = $request->validated();

        $tela = new Tela;
        $tela->Tela = $request->Tela;
        $tela->TelaStatus = 1;
        $tela->save();
        return redirect()->back()
            ->with('status', 'Tela criada com sucesso!');
    }

    public function show()
    {
        $Telas = new Tela;
        $Telas = Tela::all();
    }

    public function list()
    {
        $Telas = new Tela;
        $Telas = Tela::get();
        return view('tela/show', compact('Telas'));
    }

    public function edit($TelaID)
    {
        $tela = Tela::findOrFail($TelaID);
        return view('tela/editar', compact('tela'));
    }

    public function update(TelaAlter $request, $id)
    {
        $validated = $request->validated();

        $tela = Tela::findOrFail($id);
        $tela->Tela = $request->Tela;
        $tela->TelaStatus = $request->TelaStatus;

        if($tela->TelaStatus == 1)
            $tela->TelaDTAtivacao = date('Y-m-d H:i:s');

        if($tela->TelaStatus == 2)
            $tela->TelaDTInativacao = date('Y-m-d H:i:s');

        if($tela->TelaStatus == 3)
            $tela->TelaDTBloqueio = date('Y-m-d H:i:s');

        $tela->save();
        return redirect()->back()
            ->with('status', 'Tela alterada com sucesso!');

    }

    public function destroy($id)
    {
        $tela = Tela::findOrFail($id);
        $tela->delete();
        return redirect()->route('tela.index')->with('alert-success', 'Tela deletada com sucesso!');
    }
}
