@extends('layout.layout')

@section('title', ' Cadastro de usuário')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Cadastro de usuário</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('usuario.list') }}">Cadastro de usuário</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Adicionar</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
    <form role="form" method="post" action="{{action('UsuarioController@store')}}">
        @csrf
            @if(is_null($Escola))
            <div class="form-group">
                <label for="EscolaID">Escolas</label>
                <select class="form-control" name="EscolaID">
                    <option >Selecione a escola</option>
                    @foreach ( $Escolas as $Escola )
                        <option value="{{$Escola->EscolaID}}" {{ old('EscolaID') == $Escola->EscolaID ? 'selected' : '' }}>{{$Escola->Escola}}</option>
                    @endforeach
                </select>
            </div>
            @else
                <input type="hidden" name="EscolaID" id="EscolaID" value="{{$Escola->EscolaID}}">
            @endif
            <div class="form-group">
                <label for="PerfilID">Perfil</label>
                <select class="form-control" name="PerfilID">
                    @foreach ( $Perfis as $Perfil )
                        <option value="{{$Perfil->PerfilID}}" {{ old('PerfilID') == $Perfil->PerfilID ? 'selected' : '' }} >{{$Perfil->Perfil}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Login do Usuario</label>
                <input type="text" class="form-control" name="UsuarioLogin" value="{{old('UsuarioLogin')}}" placeholder="Usuario" id="UsuarioLogin" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Senha do Usuario</label>
                <input type="text" class="form-control" name="UsuarioSenha" value="NOVA@1234" placeholder ="NOVA@1234" id="UsuarioSenha" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Nome do Usuario</label>
                <input type="text" class="form-control" name="UsuarioNome" value="{{old('UsuarioNome')}}" id="UsuarioNome" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="UsuarioEmail">Email</label>
                        <input type="email" class="form-control" name="UsuarioEmail" placeholder="Email" value="{{old('UsuarioEmail')}}" id="UsuarioEmail" required >
                        <div class="valid-feedback">Tudo certo!</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="UsuarioCelular">Celular</label>
                <input type="text" class="form-control" name="UsuarioCelular" id="UsuarioCelular" maxlength="15" value="{{old('UsuarioCelular')}}" id="UsuarioCelular" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="UsuarioMatricula">Matrícula/Contrato</label>
                <input type="text" class="form-control" name="UsuarioMatricula" value="{{old('UsuarioMatricula') ?? 'SEM MATRICULA'}} " id="UsuarioMatricula" required >
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <select class="form-control" name="UsuarioStatus">
                    <option value="1" selected>Ativo</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
        </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script>
            $("#campoCelular").mask("(99) 09999-9999");
    </script>

@endsection
