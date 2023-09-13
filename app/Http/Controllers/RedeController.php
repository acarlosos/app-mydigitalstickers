<?php

namespace App\Http\Controllers;

use App\Rede;
use Illuminate\Http\Request;
use App\Http\Requests\Rede\RedeCreate;
use App\Http\Requests\Rede\RedeAlter;

class RedeController extends Controller
{
    public function index()
    {
        $rede = Rede::orderBy('RedeDTAtivacao', 'desc')->paginate(10);
        return view('rede/rede', ['rede' => $rede]);
    }

    public function create()
    {
        return view('rede.create');
    }

    public function store(RedeCreate $request)
    {
        $validated = $request->validated();

        $rede = new Rede;
        $rede->Rede = request('Rede');
        $rede->RedeCod = request('RedeCod');
        $rede->RedeStatus = request('RedeStatus');

        if(isset($request->RedeNomeMoeda) && $request->RedeNomeMoeda != '')
            $rede->RedeNomeMoeda = $request->RedeNomeMoeda;

        $rede->save();

        return redirect()->back()
            ->with('status', 'Rede criada com sucesso!');
    }

    public function show()
    {
        $Redes = new Rede;
        $Redes = Rede::all();
    }

    public function list()
    {
        $Redes = new Rede;
        $Redes = Rede::get();
        return view('rede/show', compact('Redes'));
    }

    public function edit($RedeID)
    {
        $rede = Rede::findOrFail($RedeID);
        return view('rede/editar', compact('rede'));
    }

    public function update(RedeAlter $request, $id)
    {
        $validated = $request->validated();

        $rede = Rede::findOrFail($id);
        $rede->Rede = request('Rede');
        $rede->RedeCod = request('RedeCod');
        $rede->RedeStatus = request('RedeStatus');

        if(isset($request->RedeNomeMoeda) && $request->RedeNomeMoeda != '')
            $rede->RedeNomeMoeda = $request->RedeNomeMoeda;

        if($rede->RedeStatus == 1)
            $rede->RedeDTAtivacao = date('Y-m-d H:i:s');

        if($rede->RedeStatus == 2)
            $rede->RedeDTInativacao = date('Y-m-d H:i:s');

        if($rede->RedeStatus == 3)
            $rede->RedeDTBloqueio = date('Y-m-d H:i:s');

        $rede->save();
        return redirect()->back()
            ->with('status', 'Rede alterada com sucesso!');

    }

    public function destroy($id)
    {
        $rede = Rede::findOrFail($id);
        $rede->delete();
        return redirect()->route('rede.index')->with('alert-success', 'Rede deletada com sucesso!');
    }
}
