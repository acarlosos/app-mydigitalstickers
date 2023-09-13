@extends('layout.layout')

@section('title', 'Editar perfil')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar perfil </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('perfil.list') }}">Lista perfil </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar perfil </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
<form role="form" method="post" action="{{url('perfil/update/'.$perfil->PerfilID)}}">
    @csrf
            <div class="form-group">
                <label for="validationCustom01">Nome do Perfil</label>
                <input type="text" class="form-control" name="Perfil" id="validationCustom01" required @if(isset($perfil))value="{{ old('', $perfil->Perfil) }}"@endif placeholder="Name" />
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="validationCustom01">Cod. Perfil</label>
                    <input type="text" class="form-control" name="PerfilCod" id="validationCustom01" required @if(isset($perfil))value="{{ old('', $perfil->PerfilCod) }}"@endif placeholder="Cod." />
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="PerfilStatus">
                    <option value="1" @if(isset($perfil) && $perfil->PerfilStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($perfil) && $perfil->PerfilStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($perfil) && $perfil->PerfilStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                               @if(isset($perfil->PerfilDTAtivacao) && $perfil->PerfilDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($perfil->PerfilDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                               @if(isset($perfil->PerfilDTInativacao) && $perfil->PerfilDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($perfil->PerfilDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                               @if(isset($perfil->PerfilDTBloqueio) && $perfil->PerfilDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($perfil->PerfilDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
            </fieldset>
        </form>
@endsection
