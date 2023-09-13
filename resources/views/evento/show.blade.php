@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Cadastro de evento')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de evento</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <strong>Cadastro de evento</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
            @csrf
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>Evento</th>
                    <th>Evento Cod</th>
                    <th>Evento Tipo</th>
                    <th>Status</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Eventos)>0)
                    @foreach ( $Eventos as $evento )
                        <tr>
                            <td>{{ $evento->Evento }}</td>
                            <td>{{ $evento->EventoCod }}</td>
                            <td>{{ $evento->EventoTipo ? 'Data' : 'Número' }}</td>
                            <td>
                                @if($evento->EventoStatus == 1)
                                    Ativo
                                @elseif($evento->EventoStatus == 2)
                                    Inativo
                                @else($evento->EventoStatus == 3)
                                    Bloqueado
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('evento/editar/'.$evento->EventoID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhum Evento Cadastrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="form-group">
                <form role="form" method="get" action="{{action('EventoController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        </div>
@endsection

@section('script')
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
                    {extend: 'excel', title: 'Evento'},
                    {extend: 'pdf', title: 'Evento'},

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
@endsection
