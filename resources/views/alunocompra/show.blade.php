@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Lista compra')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Compra</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <strong>Compra</strong>
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
                    <th>Escola</th>
                    <th>Login</th>
                    <th>Usuario Nome</th>
                    <th class="text-center">Quantidade Adquirido</th>
                    <th class="text-center">Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($AlunoCompras)>0)
                    @foreach ( $AlunoCompras as $alunocompra )
                        <tr>
                            <td>{{ $alunocompra->Escola }}</td>
                            <td>{{ $alunocompra->UsuarioLogin }}</td>
                            <td>{{ $alunocompra->UsuarioNome }}</td>
                            <td class="text-center">{{ $alunocompra->AlunoCompraQuantidade }}</td>
                            <td class="text-center">
                                <a href="{{ url('alunocompra/editar/'.$alunocompra->AlunoCompraID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Compra do Aluno não Cadastrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <form role="form" method="get" action="{{action('AlunoCompraController@index')}}">
                <button type="submit" class="btn btn-primary">NOVO</button>
            </form>
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
                    {extend: 'excel', title: 'AlunoCompra'},
                    {extend: 'pdf', title: 'AlunoCompra'},

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

