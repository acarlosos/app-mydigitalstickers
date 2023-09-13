@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('title', 'Repasse de pontos')

@section('breadcrumb')
    @if($action == 1)
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Administrar faixa de eventos </h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('eventoescola.list') }}"> Administrar faixa de eventos / Repasse de pontos</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong> Administrar faixa de eventos</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    @elseif($action == 2)
    <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Repasse de pontos </h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('eventoescola.list') }}"> Administrar faixa de eventos / Repasse de pontos</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong> Repasse de pontos - Arquivo</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    @elseif($action == 3)
    <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Repasse de pontos </h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('eventoescola.list') }}"> Administrar faixa de eventos / Repasse de pontos</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong> Repasse de pontos - Manual</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    @else
    <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Repasse de pontos </h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('eventoescola.list') }}"> Administrar faixa de eventos / Repasse de pontos</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong> Repasse de pontos - Arquivo</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    @endif
@endsection

@section('content')
            @csrf
            @if($action==1)
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Escola</th>
                            <th>Evento</th>
                            @if(isset($FaixasEventoEscolas[0]) && !$FaixasEventoEscolas[0]->EventoTipo )
                                <th class="text-center">Número Inicial</th>
                                <th class="text-center">Número Final</th>
                            @else
                                <th>Data Inicial</th>
                                <th>Data Final</th>
                            @endif
                            <th class="text-center">Pontuação</th>
                            <th class="text-center">Ação</th>

                        </tr>
                        </thead>
                        <tbody>
                            @if(count($FaixasEventoEscolas)>0)
                                @foreach ( $FaixasEventoEscolas as $FaixasEventoEscola )
                                    @isset($FaixasEventoEscola->FaixaEventoID)
                                    <tr>
                                        <td>{{ $FaixasEventoEscola->Escola }}</td>
                                        <td>{{ $FaixasEventoEscola->Evento }}</td>
                                        @if(isset($FaixasEventoEscolas[0]) && !$FaixasEventoEscolas[0]->EventoTipo )
                                            <td class="text-center">{{ $FaixasEventoEscola->FaixaEventoNumIni }}</td>
                                            <td class="text-center">{{ $FaixasEventoEscola->FaixaEventoNumFim }}</td>
                                        @else
                                        <td> @if(isset($FaixasEventoEscola->FaixaEventoDTIni) && $FaixasEventoEscola->FaixaEventoDTIni != '') {{ \Carbon\Carbon::parse($FaixasEventoEscola->FaixaEventoDTIni)->format('d/m/Y') }} @endif</td>
                                        <td> @if(isset($FaixasEventoEscola->FaixaEventoDTFim) && $FaixasEventoEscola->FaixaEventoDTFim != '') {{ \Carbon\Carbon::parse($FaixasEventoEscola->FaixaEventoDTFim)->format('d/m/Y') }} @endif</td>
                                        @endif
                                        <td class="text-center">{{ $FaixasEventoEscola->FaixaEventoPontoQuantidade }}</td>
                                        <td>
                                            <a href="{{route('eventoescola.faixaedit' , [$FaixasEventoEscola->EventoEscolaID , $FaixasEventoEscola->FaixaEventoID] )}}">Alterar </a> |
                                            <a href="{{route('eventoescola.faixadelete' , [$FaixasEventoEscola->EventoEscolaID , $FaixasEventoEscola->FaixaEventoID] )}}">Excluir</a>
                                        </td>
                                    </tr>
                                    @endisset
                                @endforeach
                            @else
                            <tr>
                                <td colspan="7">Nenhuma Faixa de Evento Cadastrada</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <a href="{{ url('eventoescola/eventofaixa/faixanew/'.$FaixasEventoEscola->EventoEscolaID) }}">
                        <button class="btn btn-primary">NOVO</button>
                    </a>
                </div>
            @endif

            @if($action==2)
                <div class="form-group">
                    @if (session('erro'))
                        <div class="alert-danger">
                            {!! session('erro') !!}
                        </div>
                    @endif
                    <div class="error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('eventoescola/eventofaixa/faixagravarimport/'. $FaixasEventoEscolas[0]->EventoEscolaID)}}">
                        {{  csrf_field()  }}
                        <h4 for="exampleInputPassword1">Importar Repasse de Pontos</h4>
                        <input type="hidden" name="EventoTipo" value="{{$FaixasEventoEscolas[0]->EventoTipo}}">
                        <input type="file" class="form-control-file" name="importcsv" id="importcsv" required>
                        <br>
                        <hr>
                        <div class="form-group">
                            @if($FaixasEventoEscolas[0]->EventoTipo)
                                <h3 for="exampleInputPassword1">Formato Excel <a  href="{{route('eventoescola.modelodata')}}" class="btn btn-sm ml-3 btn-warning">Download Arquivo Exemplo</a></h3>
                            @else
                                <h3 for="exampleInputPassword1">Formato Excel <a  href="{{route('eventoescola.modelonumero')}}" class="btn btn-sm ml-3 btn-warning">Download Arquivo Exemplo</a></h3>
                            @endif
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Importar</button>
                    </form>
                </div>
            @endif
            @if($action==3)
                @includeIf('components.message')
                <div class="form-group">
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('eventoescola/eventofaixa/faixagravarmanual/'.$EventoEscolaID)}}">
                        {{  csrf_field()  }}
                        <h4 for="exampleInputPassword1">Repasse de Pontos</h4>
                        <br>
                        <fieldset disabled>
                            <div class="form-group">
                                <label for="Evento">Evento</label>
                                <select class="form-control" name="Evento">
                                    <option value =""> {{$Evento->Evento}}</option>
                                </select>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="UsuarioEscolaID">Aluno</label>
                            <select class="form-control js-select-single" name="UsuarioEscolaID" id="UsuarioEscolaID" required >
                                <option value="">Selecione o aluno</option>
                                @foreach ( $UsuarioEscolas as $UsuarioEscola )
                                    <option value ="{{$UsuarioEscola->UsuarioEscolaID}}" {{ old('UsuarioEscolaID') == $UsuarioEscola->UsuarioEscolaID ? 'selected' : ''}}> {{$UsuarioEscola->UsuarioLogin}} - {{$UsuarioEscola->UsuarioNome}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($Evento->EventoTipo)
                            <div class="form-group">
                                <label for="DataFIm">Parâmetro - Data</label>
                                <div class="input-group " id="calendarioFim">
                                    <input type="date" class="form-control" name="dt-disable"  value="{{old('dt-disable') ?? now()->format('Y-m-d')}}" disabled id="DT">
                                    <input type="hidden" name="DT" id="DT" value="{{now()->format('Y-m-d')}}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parâmetro - Número</label>
                                <input type="number" class="form-control" min="1" max="9999999" placeholder="Informe o número" name="Ponto"  value="{{old('Ponto')}}" id="Ponto">
                            </div>
                        @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">OK</button>
                        </div>
                    </form>
                </div>
            @endif
@endsection
@section('script')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script src="{{ url('js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ url('js/inspinia.js') }}"></script>
    <script src="{{ url('js/plugins/pace/pace.min.js') }}"></script>

    <!-- Page-Level Scripts -->
    <script>

        // Upgrade button class name
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                },

                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'EventoEscolas'},
                    {extend: 'pdf', title: 'EventoEscolas'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

        $(".campoCNPJ").mask("99.999.999/9999-99");

    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-select-single').select2();
        });
    </script>
@endsection