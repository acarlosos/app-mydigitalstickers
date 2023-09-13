@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Lista tabela para tradução de idiomas')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista tabela para tradução de idiomas</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <strong>Lista tabela para tradução de idiomas</strong>
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
                    <th>BR</th>
                    <th>US</th>
                    <th>ES</th>
                    <th>Atualizar</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Traducoes)>0)
                    @foreach ( $Traducoes as $Traducao )
                        <tr>
                            <td>{{ $Traducao->TraducaoTextoBr }}</td>
                            <td>{{ $Traducao->TraducaoTextoUs }}</td>
                            <td>{{ $Traducao->TraducaoTextoEs }}</td>
                            <td>
                                <a href="{{ url('traducao/editar/'.$Traducao->TraducaoID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nenhuma Palavra Cadastrada</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
            <div class="form-group">
                <form role="form" method="get" action="{{action('TraducaoController@index')}}">
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
                    {extend: 'excel', title: 'Traducao'},
                    {extend: 'pdf', title: 'Traducao'},

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
