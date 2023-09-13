@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('title', ' Cadastro de escola')

@section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2> Cadastro de escola</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('escola.list') }}"> Cadastro de escola</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Seleção de eventos</strong>
                </li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="row mb-4">
        <div class="col-md-4">
            <p><b>Rede:</b> {{$escola->RedeName[0]->Rede}}</p>
            <p><b>Nome da Escola:</b> {{$escola->Escola}}</p>
            <p><b>Cod. Escola:</b> {{$escola->EscolaCod}}</p>
            <p><b>Email:</b> {{$escola->EscolaEmail}}</p>
            <p><b>Telefone:</b> {{ mascaraTelefone($escola->EscolaTelefone)}}</p>
            <p><b>Celular:</b> {{ mascaraTelefone($escola->EscolaCelular)}}</p>
        </div>
        <div class="col-md-4">
            <p><b>E-mail para cobrança:</b> {{$escola->EscolaCelularPix}}</p>
            <p><b>Escola CNPJ:</b> {{mascaraCnpj( $escola->EscolaCNPJ )}}</p>
            <p><b>Nome Moeda Escola:</b> {{$escola->EscolaNomeMoeda}}</p>
            <p><b>Quantidade de alunos:</b> {{$escola->Qtdaluno}}</p>
            <p><b>Valor de cobrança:</b> {{ 'R$ ' . $escola->EscolaValorTot}}</p>
            <p><b>Dia Vencimento:</b> {{ $escola->EscolaDiaVencimento}}</p>
            @isset($escola->EscolaMotivoBloqueio)
            <p><b>Motivo Bloqueio:</b> {{ $escola->EscolaMotivoBloqueio}}</p>
            @endisset
        </div>
        <div class="col-md-4">
            <p><b>Logradouro: </b>{{$escola->EscolaLogradouro}}, {{$escola->EscolaNumero}}</p>
            <p><b>Complemento: </b>{{$escola->EscolaComplemento}}</p>
            <p><b>Bairro: </b>{{$escola->EscolaBairro}}</p>
            <p><b>Cidade: </b>{{$escola->EscolaCidade}}</p>
            <p><b>UF: </b>{{$escola->EscolaUF}}</p>
            <p><b>Cep: </b>{{$escola->EscolaCep}}</p>
        </div>
    </div>

    <form role="form" method="post" action="{{ route('escola.updateparams' , $escola->EscolaID )  }}"  enctype="multipart/form-data" >
        @csrf
        <fieldset disabled>

        </fieldset>
        <div class="form-group">
            <label for="TelaID"><b>Eventos disponíveis/selecionados</b></label>
            <div class="form-check">
                @foreach ($escola['Eventos'] as $Evento)
                    <div class="i-checks">
                        <label>
                            <input
                                {{ $Evento->EventoStatus == 1 ? '' : 'disabled' }}
                                type="checkbox"
                                class="form-check-input"
                                name="EventoID[{{ $Evento->EventoID }}]"
                                value="{{ $Evento->EventoID }}"
                                @if (isset($escola['EscolaEventos']) && count($escola['EscolaEventos']) > 0)
                                    @foreach ($escola['EscolaEventos'] as $escolaEvento)
                                        {{$Evento->EventoID == $escolaEvento->EventoID ? 'checked' : '' }}
                                @endforeach
                        @endif>
                        {{ $Evento->Evento }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"><b>Logo Escola</b></label>
            <input type="file" class="form-control-file" name="image" id="image">
            <label for="exampleInputPassword1">Tamanho Máximo 25KB </label>
        </div>
        <div class="form-group">
            <img src="{{ asset('storage/escola' . $escola->EscolaID . '.png') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">OK</button>
        </div>
        <fieldset disabled>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" id="disabledTextInput" class="form-control"
                        placeholder="Data Cadastro:   --/--/---- 00:00:00"
                        @if (isset($escola->EscolaDTCadastro) && $escola->EscolaDTCadastro != '') value="Data Cadastro: {{ \Carbon\Carbon::parse($escola->EscolaDTCadastro)->format('d/m/Y H:i:s') }} " @endif>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" id="disabledTextInput" class="form-control"
                        placeholder="Data Ativação:   --/--/---- 00:00:00"
                        @if (isset($escola->EscolaDTAtivacao) && $escola->EscolaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($escola->EscolaDTAtivacao)->format('d/m/Y H:i:s') }} " @endif>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" id="disabledTextInput" class="form-control"
                        placeholder="Data Inativação:   --/--/---- 00:00:00"
                        @if (isset($escola->EscolaDTInativacao) && $escola->EscolaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($escola->EscolaDTInativacao)->format('d/m/Y H:i:s') }} " @endif>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" id="disabledTextInput" class="form-control"
                        placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                        @if (isset($escola->EscolaDTBloqueio) && $escola->EscolaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($escola->EscolaDTBloqueio)->format('d/m/Y H:i:s') }} " @endif>
                </div>
            </div>
        </fieldset>
    </form>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>

    <script src="{{ url('js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#campoTelefone").mask("(99) 9999-9999");
            $("#campoCelular").mask("(99) 09999-9999");
            $("#campoCNPJ").mask("99.999.999/9999-99");
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green'
            });
        });
    </script>

@endsection
