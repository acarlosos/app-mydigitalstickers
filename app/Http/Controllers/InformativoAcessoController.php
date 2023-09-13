<?php

namespace App\Http\Controllers;

use App\InformativoAcesso;
use DB;
use App\Escola;
use Illuminate\Http\Request;
use App\Http\Requests\InformativoAcesso\InformativoAcessoCreate;
use App\Http\Requests\InformativoAcesso\InformativoAcessoAlter;
use Carbon\Carbon;

class InformativoAcessoController extends Controller
{
    public function index()
    {
        $informativoacesso = new InformativoAcesso();
        $escolas = Escola::orderBy('Escola')->get();
        return view('informativoacesso.create', compact('escolas','informativoacesso'));
    }

    public function create()
    {
        $escolas = Escola::orderBy('Escola')->get();
        return view('informativoacesso.create', compact('escolas'));
    }

    public function store(InformativoAcessoCreate $request)
    {

        $validated = $request->validated();
        $validated['InformativoAcessoDTFim'] = Carbon::createFromFormat('Y-m-d', $validated['InformativoAcessoDTFim'])->format('d/m/Y');
        $validated['InformativoAcessoDTIni'] = Carbon::createFromFormat('Y-m-d', $validated['InformativoAcessoDTIni'])->format('d/m/Y');
        $informativoAcesso = InformativoAcesso::create($validated );
        return redirect()->back()->with('status', 'Informativo Acesso criado com sucesso!');
        
    }

    public function show()
    {
        return view('myarticlesview',['articles'=>$articles]);
    }

    public function list()
    {
        $InformativoAcessos = InformativoAcesso::all();
        return view('informativoacesso.show', compact('InformativoAcessos'));
    }

    public function edit($InformativoAcessoID)
    {
        $escolas = Escola::orderBy('Escola')->get();
        $informativoacesso = InformativoAcesso::find($InformativoAcessoID);
        return view('informativoacesso/editar', compact('informativoacesso','escolas'));
    }
    public function update(InformativoAcessoAlter $request, $id)
    {
        $validated = $request->validated();
        $validated['InformativoAcessoDTFim'] = Carbon::createFromFormat('Y-m-d', $validated['InformativoAcessoDTFim'])->format('d/m/Y');
        $validated['InformativoAcessoDTIni'] = Carbon::createFromFormat('Y-m-d', $validated['InformativoAcessoDTIni'])->format('d/m/Y');
        InformativoAcesso::find($id)->update($validated);
        return redirect()->back()->with('status', 'InformativoAcesso alterado com sucesso!');
    }

    public function destroy($id)
    {
        $informativoacesso = InformativoAcesso::findOrFail($id);
        $informativoacesso->delete();
        return redirect()->route('informativoacesso.index')->with('alert-success', 'InformativoAcesso deletado com sucesso!');
    }
}
