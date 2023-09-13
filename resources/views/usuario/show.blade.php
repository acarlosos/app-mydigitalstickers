@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Cadastro de usuário')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de usuário</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <strong>Cadastro de usuário</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
            <div class="table-responsive">
                <?php
                    $AcessoCad = app(\App\Http\Controllers\UsuarioController::class)->permissaoAcesso(app('request'));
                ?>
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>Escola</th>
                    <th>Usuario</th>
                    <th>Perfil</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Status</th>
                    @foreach ( $AcessoCad as $AcessoCadItem )
                        @if($AcessoCadItem->Tela)
                            <th>Atualizar</th>
                        @endif
                    @endforeach
                    <th>Dados do Usuário</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Usuarios)>0)
                    @foreach ( $Usuarios as $usuario )
                        <tr>
                            <td>{{ $usuario->Escola ?? '-' }}</td>
                            <td>{{ $usuario->UsuarioNome }}</td>
                            <td>{{ $usuario->Perfil }}</td>
                            <td>{{ $usuario->UsuarioLogin }}</td>
                            <td>{{ $usuario->UsuarioEmail }}</td>
                            <td>
                                @if($usuario->UsuarioStatus == 1)
                                    Ativo
                                @elseif($usuario->UsuarioStatus == 2)
                                    Inativo
                                @else($usuario->UsuarioStatus == 3)
                                    Bloqueado
                                @endif
                            </td>
                            @foreach ( $AcessoCad as $AcessoCadItem )
                                @if($AcessoCadItem->Tela)
                                    <td>
                                        <a href="{{ url('usuario/editar/'.$usuario->UsuarioID) }}">Alterar</a>
                                    </td>
                                @endif
                            @endforeach
                            <td>
                                <a href="{{ url('usuario/editaraluno/'.$usuario->UsuarioID) }}">Alterar</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Nenhum Usuário Cadastrado</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
            @foreach ( $AcessoCad as $AcessoCadItem )
                @if($AcessoCadItem->Tela)
                    <div class="form-group">
                        <a href="{{route('usuario.index')}}" class="btn btn-primary">NOVO</a>
                        <a href="{{route('usuario.importar')}}"class="btn btn-primary ml-3">IMPORTAR ALUNO</a>
                    </div>
                @endif
            @endforeach

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
                    {extend: 'excel', title: 'Usuario'},
                    {extend: 'pdf', title: 'Usuario'},

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