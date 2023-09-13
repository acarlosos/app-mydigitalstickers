@extends('layout.layout')

@section('title', 'Editar tela')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar tela</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('tela.list') }}">Lista tela </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar tela</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
<form role="form" method="post" action="{{url('tela/update/'.$tela->TelaID)}}">
    @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nome da Tela</label>
                <input type="text" class="form-control" name="Tela" id="validationCustom01" required @if(isset($tela))value="{{ old('', $tela->Tela) }}"@endif placeholder="Name" />
                <div class="valid-feedback">Tudo certo!</div> 
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="TelaStatus">
                    <option value="1" @if(isset($tela) && $tela->TelaStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($tela) && $tela->TelaStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($tela) && $tela->TelaStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                               @if(isset($tela->TelaDTAtivacao) && $tela->TelaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($tela->TelaDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                               @if(isset($tela->TelaDTInativacao) && $tela->TelaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($tela->TelaDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                               @if(isset($tela->TelaDTBloqueio) && $tela->TelaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($tela->TelaDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
            </fieldset>
        </form>
@endsection
