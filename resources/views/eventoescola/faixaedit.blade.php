@extends('layout.layout')

@section('title', 'Cadastro de faixas eventos')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Administrar faixa de eventos </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('eventoescola.list') }}"> Administrar faixa de eventos / Repasse de pontos</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Editar faixa de eventos</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
@endsection

@section('content')
    <form role="form" method="post" action="{{route('eventoescola.faixaupdate', [$eventoEscola->EventoEscolaID, $faixaEvento->FaixaEventoID ] )}}  ">
        @csrf
            <div class="form-group">
                <fieldset disabled>
                    <div class="form-group">
                        <label for="RedeID">Rede</label>
                        <input type="text" class="form-control" value="{{$eventoEscola->Rede}}">
                        <input type="hidden" class="form-control" name="EventoEscolaID" value="{{$eventoEscola->EventoEscolaID}}">
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Escola</label>
                        <input type="text" class="form-control" value="{{$eventoEscola->Escola}}">
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Evento</label>

                        <input type="text" class="form-control" value="{{$eventoEscola->Evento}}">
                    </div>
                </fieldset>
                <hr>
                <div class="form-group">
                    <h2 id="content">Parâmetros - Faixa</h2>
                    @if($eventoEscola->EventoTipo)
                    <div  id="ParamDataIni" class="form-group">
                        <label for="DataFIm">Data inicial </label>
                        <div class="input-group " id="calendarioIni">
                            <input type="date" class="form-control" name="FaixaEventoDTIni" value="{{substr($faixaEvento->FaixaEventoDTIni, 0 , 10) }}"  placeholder="dd/mm/aaaa" required>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div  id="ParamDataFim" class="form-group">
                        <label for="DataFIm">Data final</label>
                        <div class="input-group " id="calendarioFim">
                            <input type="date" class="form-control" name="FaixaEventoDTFim" value="{{substr($faixaEvento->FaixaEventoDTFim, 0 , 10) }}"  placeholder="dd/mm/aaaa" required>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    @else
                    <div id="ParamNumIni" class="form-group">
                        <label for="DataFIm">Número Inicial</label>
                        <input type="number" class="form-control" name="FaixaEventoNumIni"  value="{{$faixaEvento->FaixaEventoNumIni }}" min="1" max="100" required />
                    </div>
                    <div id="ParamNumFim" class="form-group">
                        <label for="DataFIm">Número Final</label>
                        <input type="number" class="form-control" name="FaixaEventoNumFim" value="{{$faixaEvento->FaixaEventoNumFim }}" min="1" max="100" required />
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="DataFIm">Pontuação</label>
                    <input type="number" class="form-control" name="FaixaEventoPontoQuantidade" min="1" max="100" value="{{$faixaEvento->FaixaEventoPontoQuantidade }}" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
            </div>
            <input type="hidden" name="id" value="{{$faixaEvento->FaixaEventoID }}">
        </form>
@endsection
@section('script')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection