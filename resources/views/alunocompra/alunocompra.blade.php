@extends('layout.layout')

@section('title', 'Compra')

@section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Cadastrar Aluno Compra</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('alunocompra.list') }}">Lista compra</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Compra</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@endsection

@section('content')
    <form role="form" method="post" action="{{action('AlunoCompraController@store')}}">
        @csrf
        <div class="form-group">
            <label for="UsuarioEscolaID">Usuario Escola</label>
            <select class="form-control" name="UsuarioEscolaID" >
                @foreach ( $UsuarioEscolas as $UsuarioEscola )
                    <option value ="{{$UsuarioEscola->UsuarioEscolaID}}"  {{ old('UsuarioEscolaID') == $UsuarioEscola->UsuarioEscolaID ? 'selected' : ''}}>
                        {{$UsuarioEscola->UsuarioNome}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="AlunoCompraQuantidade">Pontos</label>
            <input type="text" class="form-control" name="AlunoCompraQuantidade" id="AlunoCompraQuantidade" value="{{old('AlunoCompraQuantidade')}}" required>
            <div class="valid-feedback">Tudo certo!</div>
        </div>
        <div class="form-group">
            <label for="Status">Status</label>
            <select class="form-control" name="AlunoCompraStatus">
                <option value="1">Ativo</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">OK</button>
        </div>
        <fieldset disabled>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00">
                </div>
            </div>
        </fieldset>
    </form>
@endsection