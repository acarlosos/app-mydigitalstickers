@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Lista log informativo de acesso')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista log informativo de acesso</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <strong>Lista log informativo de acesso</strong>
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
                        <th>Usuario</th>
                        <th>Data Ativação</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($UsuarioEscolaInformativoAcessos)>0)
                            @foreach ( $UsuarioEscolaInformativoAcessos as $usuarioescolainformativoacesso )
                                <tr>
                                    <td>{{ $usuarioescolainformativoacesso->Usuario }}</td>
                                    <td>{{ $usuarioescolainformativoacesso->UsuarioEscolaInformativoAcessoIDDTAtivacao->format('d/m/Y') }}</td>
                                    <td>
                                        @if($usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso == 1)
                                            Aprovado
                                        @else($usuarioescolainformativoacesso->UsuarioEscolaInformativoAcesso == 2)
                                            Não Aprovado
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Nenhum cadastrado</td>
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
                    {extend: 'excel', title: 'UsuarioEscolaEscolaInforamtivoAcesso'},
                    {extend: 'pdf', title: 'UsuarioEscolaEscolaInforamtivoAcesso'},

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