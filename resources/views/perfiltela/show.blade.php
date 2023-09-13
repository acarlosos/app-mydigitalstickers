@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', ' Associar perfil x tela')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Associar perfil x tela</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <strong>Associar perfil x tela</strong>
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
                    <th>Perfil</th>
                    <th>Status</th>
                    <th>Acessos</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($PerfilTelas)>0)
                        @foreach ( $PerfilTelas as $perfiltela )
                            <tr>
                                <td>{{ $perfiltela->Perfil }}</td>
                                <td>
                                    @if($perfiltela->PerfilTelaStatus == 1)
                                        Ativo
                                    @elseif($perfiltela->PerfilTelaStatus == 2)
                                        Inativo
                                    @else($perfiltela->PerfilTelaStatus == 3)
                                        Bloqueado
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('perfiltela/editar/'.$perfiltela->PerfilID) }}">Alterar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="3">Nenhum Perfil Tela Cadastrado</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if(false)
            <div class="form-group">
                <form role="form" method="get" action="{{action('PerfilTelaController@index')}}">
                    <button type="submit" class="btn btn-primary">NOVO</button>
                </form>
            </div>
        @endif
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
                    {extend: 'excel', title: 'PerfilTela'},
                    {extend: 'pdf', title: 'PerfilTela'},

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

    </script>
@endsection