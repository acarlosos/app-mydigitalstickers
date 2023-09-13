@extends('layout.app')
@section('content')
<br><br>
<div class="d-flex align-items-center justify-content-center text-center">
    <div class="box mt-5 resgate">
        <img src="{{asset('vendor/img/gato.png')}}" class="sgato">
        <img src="{{asset('vendor/img/cofre.png')}}" class="scofre">
        <div>Você possui</div>
        <div class="quantidade">{{$AlunoCarteiraTot}}</div>
        <div>{{session()->get('EscolaNomeMoeda') ?? 'Stickers'}}</div>
        <hr>
        <div>
            Quantos {{session()->get('EscolaNomeMoeda') ?? 'Stickers'}} você converterá em presentes?
        </div>
        <form role="form" method="post" action="{{route('alunocompra.inserir')}}">
            @csrf
            <input type="hidden" name="AlunoCompraStatus" value="1">
            <input type="hidden" name="UsuarioEscolaID" value="{{$UsuarioEscolas->first()->UsuarioEscolaID}}">
            <input type="number" min="1" max="{{$AlunoCarteiraTot}}"  id="AlunoCompraQuantidade" name="AlunoCompraQuantidade" class="mt-3"  autocomplete="off" required>
            <button type="submit" class="bt mt-4">Converter agora</button>
        </form>

    </div>
</div>
@endsection