@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('title', ' Usuário por escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10 ">
        <h2 > Usuário por escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('usuarioescola.list') }}"> Usuário por escola</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Relação de usuários</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Escola: {{$UsuarioEscolas['IDS'][0]->Escola}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Perfil</th>
                        <th>Status</th>
                        <th>Cadastro</th>
                    </thead>
                    <tbody>
                        @foreach ( $UsuarioEscolas['Usuarios'] as $Usuario )
                            <tr>
                                <td>{{$Usuario->UsuarioNome}}</td>
                                <td>{{$Usuario->UsuarioLogin}}</td>
                                <td>{{$Usuario->Perfil}}</td>
                                <td>
                                    @if($Usuario->UsuarioStatus == 1)
                                        Ativo
                                    @elseif($Usuario->UsuarioStatus == 2)
                                        Inativo
                                    @else($Usuario->UsuarioStatus == 3)
                                        Bloqueado
                                    @endif
                                </td>
                                <td><a href="{{route('usuario.editar', $Usuario->UsuarioID)}}">Alterar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green'
            });
        });
    </script>
@endsection

