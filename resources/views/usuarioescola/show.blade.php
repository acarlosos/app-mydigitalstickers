@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Usuário por escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Usuário por escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <strong> Usuário por escola</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>Escola</th>
                    <th class="text-center">Escola Status</th>
                    <th class="text-center"> Relação</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($UsuarioEscolas)>0)
                        @foreach ( $UsuarioEscolas as $usuarioescola )
                            <tr>
                                <td>{{ $usuarioescola->Escola }}</td>
                                <td class="text-center">
                                    @if($usuarioescola->UsuarioEscolaStatus == 1)
                                        Ativo
                                    @elseif($usuarioescola->UsuarioEscolaStatus == 2)
                                        Inativo
                                    @else($usuarioescola->UsuarioEscolaStatus == 3)
                                        Bloqueado
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('usuarioescola/editar/'.$usuarioescola->EscolaID) }}">Listar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6">Nenhuma Escola Cadastrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
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
                    {extend: 'excel', title: 'UsuarioEscola'},
                    {extend: 'pdf', title: 'UsuarioEscola'},

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