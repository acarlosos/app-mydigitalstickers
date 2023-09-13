@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('title', 'Cadastro de eventos da escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de eventos da escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('eventoescola.list') }}"> Repasse de pontos</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastro de eventos da escola</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{action('EventoEscolaController@store')}}">
            @csrf
                <div class="form-group">
                    <label for="EscolaID">Escola</label>
                    <select class="form-control" name="EscolaID">
                        @foreach ( $Dados->EscolaID as $Escola )
                            <option value="{{$Escola->EscolaID}}">{{$Escola->Escola}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="EventoID">Evento</label>
                    <div class="form-check">
                        @foreach ( $Dados->EventoID as $Evento )

                        <div class="i-checks">
                            <label>
                                <input type="checkbox" class="form-check-input" name="EventoID[{{$Evento->EventoID}}]" value="{{$Evento->EventoID}}" />
                               <i></i> {{$Evento->Evento}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-check-input" name="EventoStatus" value="1">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                </div>
        </form>
@endsection

@section('script')
<script src="{{ url('js/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green'
        });
    });
</script>
@endsection