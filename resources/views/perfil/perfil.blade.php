@extends('layout.layout')

@section('title', 'Cadastro de perfil')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de perfil</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('perfil.list') }}">Lista perfil </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastro de perfil</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
    <form role="form" method="post" action="{{action('PerfilController@store')}}">
        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nome do Perfil</label>
                <input type="text" class="form-control" name="Perfil" placeholder="Name" id="validationCustom01" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cod. Perfil</label>
                    <input type="text" class="form-control" name="PerfilCod" placeholder="Cod. Perfil" id="validationCustom01" required >
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="PerfilStatus">
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
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação: --/--/---- 00:00:00">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00">
                    </div>
                </div>
            </fieldset>
        </form>
@endsection