@extends('layout.layout')

@section('title', 'Cadastro de evento')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de evento</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('evento.list') }}">Cadastro de evento</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar evento</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
            <form role="form" method="post" action="{{url('evento/update/'.$evento->EventoID)}}">
                @csrf
                <div class="form-group">
                    <label for="UsuarioID">Usuario</label>
                    <select class="form-control" name="UsuarioID">
                        @foreach ( $evento->Usuario as $Usuario )
                            <option @if ($Usuario->UsuarioID == $evento->UsuarioID) selected @endif value="{{$Usuario->UsuarioID}}">{{$Usuario->UsuarioNome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Evento</label>
                    <input type="text" class="form-control" name="Evento" id="validationCustom01" required @if(isset($evento))
                        value="{{ old('', $evento->Evento) }}"@endif placeholder="Evento" />
                        <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="validationCustom01">Cod. do Evento</label>
                    <input type="text" class="form-control" name="EventoCod" value="{{$evento->EventoCod ?? ''}}" placeholder="Cod. Evento" id="validationCustom01" required >
                    <div class="valid-feedback">Tudo certo!</div>
                </div>
                <div class="form-group">
                    <label for="Evento">Tipo do evento {{$evento->EventoTipo}}</label>
                    <select class="form-control" name="EventoTipo">
                        <option value="0"  {{ isset($evento) && !$evento->EventoTipo ? 'selected' : '' }} >Número</option>
                        <option value="1"  {{ isset($evento) && $evento->EventoTipo ? 'selected' : '' }} >Data</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Evento">Status</label>
                    <select class="form-control" name="EventoStatus">
                        <option value="1" @if(isset($evento) && $evento->EventoStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($evento) && $evento->EventoStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($evento) && $evento->EventoStatus == 3)selected @endif>Bloqueado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                @if(isset($evento->EventoDTAtivacao) && $evento->EventoDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($evento->EventoDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                                @if(isset($evento->EventoDTInativacao) && $evento->EventoDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($evento->EventoDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                                @if(isset($evento->EventoDTBloqueio) && $evento->EventoDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($evento->EventoDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                </fieldset>
            </form>
@endsection