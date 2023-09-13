<?php

namespace App\Http\Controllers;

use App\Traducao;
use Illuminate\Http\Request;
use App\Http\Requests\Traducao\TraducaoCreate;
use App\Http\Requests\Traducao\TraducaoAlter;


class TraducaoController extends Controller
{
    public function index()
    {
        $traducao = Traducao::orderBy('TraducaoID', 'desc')->paginate(10);
        return view('traducao/traducao', ['traducao' => $traducao]);
    }

    public function create()
    {
        return view('traducao.create');
    }

    public function store(TraducaoCreate $request)
    {
        $validated = $request->validated();

        $traducao = new Traducao;
        $traducao->TraducaoTextoBr = $request->TraducaoTextoBr;
        $traducao->TraducaoTextoUs = $request->TraducaoTextoUs;
        $traducao->TraducaoTextoEs = $request->TraducaoTextoEs;
        $traducao->save();
        return redirect()->back()
            ->with('status', 'Texto cadastrado!');
    }

    public function show()
    {
        $Traducoes = new Traducao;
        $Traducoes = Traducao::all();
    }

    public function list()
    {
        $Traducoes = new Traducao;
        $Traducoes = Traducao::get();
        return view('traducao/show', compact('Traducoes'));
    }

    public function edit($TraducaoID)
    {
        $traducao = Traducao::findOrFail($TraducaoID);
        return view('traducao/editar', compact('traducao'));
    }

    public function update(TraducaoAlter $request, $id)
    {
        $validated = $request->validated();

        $traducao = Traducao::findOrFail($id);
        $traducao->TraducaoTextoBr = $request->TraducaoTextoBr;
        $traducao->TraducaoTextoUs = $request->TraducaoTextoUs;
        $traducao->TraducaoTextoEs = $request->TraducaoTextoEs;

        $traducao->save();
        return redirect()->back()
            ->with('status', 'Perfil alterada com sucesso!');

    }
}
