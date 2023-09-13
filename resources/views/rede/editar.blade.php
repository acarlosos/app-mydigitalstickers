@extends('layout.layout')

@section('title', 'Editar rede')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar rede</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('rede.list') }}">Lista rede </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar rede</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection
@section('content')
<form role="form" method="post" action="{{url('rede/update/'.$rede->RedeID)}}">
            @csrf
            <div class="form-group">
                <label for="validationCustom01">Nome da Rede</label>
                <input type="text" class="form-control" name="Rede" id="validationCustom01" required @if(isset($rede))value="{{ old('', $rede->Rede) }}"@endif placeholder="Name" />
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="validationCustom01">Cod. Rede</label>
                    <input type="text" class="form-control" name="RedeCod" id="validationCustom01" required @if(isset($rede))value="{{ old('', $rede->RedeCod) }}"@endif placeholder="Cod." />
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Moeda da Rede</label>
                <input type="text" class="form-control" name="RedeNomeMoeda" placeholder="Name" @if(isset($rede))value="{{ old('', $rede->RedeNomeMoeda) }}"@endif>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="RedeStatus">
                    <option value="1" @if(isset($rede) && $rede->RedeStatus == 1)selected @endif>Ativo</option>
                    <option value="2" @if(isset($rede) && $rede->RedeStatus == 2)selected @endif>Inativo</option>
                    <option value="3" @if(isset($rede) && $rede->RedeStatus == 3)selected @endif>Bloqueado</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                @if(isset($rede->RedeDTAtivacao) && $rede->RedeDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($rede->RedeDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                               @if(isset($rede->RedeDTInativacao) && $rede->RedeDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($rede->RedeDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                               @if(isset($rede->RedeDTBloqueio) && $rede->RedeDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($rede->RedeDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                    </div>
                </div>
            </fieldset>
        </form>
@endsection