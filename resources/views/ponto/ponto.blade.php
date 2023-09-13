@extends('layout.layout')

@section('title', ' Pontos da escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Pontos da escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('ponto.list') }}"> Pontos da escola</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Cadastrar ponto</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{action('PontoController@store')}}">
            @csrf
            @if($exibir)
                <div class="form-group">
                    <label for="UsuarioEscolaID">Escola Usuario </label>
                    <select class="form-control" name="UsuarioEscolaID" >
                        @foreach ( $UsuarioEscolas as $UsuarioEscola )
                            <option value ="{{$UsuarioEscola->UsuarioEscolaID}}">
                                {{$UsuarioEscola->Escola.' - '.$UsuarioEscola->UsuarioNome}}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <div class="form-group">
                    <label for="UsuarioEscolaID">Escola Usuario </label>
                    <select class="form-control" name="UsuarioEscolaID" >
                        <option value ="{{$UsuarioEscolas->UsuarioEscolaID}}">
                                {{$UsuarioEscolas->Escola.' - '.$UsuarioEscolas->UsuarioNome}}</option>
                    </select>
                </div>
            @endif
            <div class="form-group">
                <label for="UsuarioEscolaID">Adicionar / Baixar Pontos</label>
                <select class="form-control" name="PontoOperacao" >
                    <option value ="1">+ / Adicionar</option>
                    <option value ="2">- / Baixar</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pontos</label>
                    <input type="text" class="form-control" name="PontoQuantidade" id="validationCustom01" required >
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
@endsection
