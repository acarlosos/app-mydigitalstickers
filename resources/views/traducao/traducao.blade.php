@extends('layout.layout')

@section('title', 'Tabela para tradução de idiomas')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastrar tabela para tradução de idiomas</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('traducao.list') }}">Lista tabela para tradução de idiomas </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastrar tabela para tradução de idiomas</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{action('TraducaoController@store')}}">
            @csrf
            <div class="form-group">
                    <label for="exampleInputEmail1">Br</label>
                    <input type="text" class="form-control" name="TraducaoTextoBr" id="validationCustom01" required >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Us</label>
                    <input type="text" class="form-control" name="TraducaoTextoUs" id="validationCustom01" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Es</label>
                    <input type="text" class="form-control" name="TraducaoTextoEs" id="validationCustom01" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </form>
@endsection
