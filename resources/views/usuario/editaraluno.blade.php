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
                <strong> Editar</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection
@section('content')
        <form role="form" method="post" action="{{url('usuario/updatealuno/'.$usuario->UsuarioID)}}" enctype="multipart/form-data" >
            @csrf
            <fieldset disabled>
                <div class="form-group">
                    <label for="exampleInputEmail1">Login do Usuario</label>
                    <input type="text" class="form-control" name="UsuarioLogin" @if(isset($usuario))value="{{ old('', $usuario->UsuarioLogin) }}"@endif placeholder="Usuario" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome do Usuario</label>
                    <input type="text" class="form-control" name="UsuarioNome" @if(isset($usuario))value="{{ old('', $usuario->UsuarioNome) }}"@endif />
                </div>
            </fieldset>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="UsuarioEmail" placeholder="Email" id="email"  @if(isset($usuario))value="{{ old('', $usuario->UsuarioEmail) }}"@endif />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" name="UsuarioCelular" id="campoCelular" maxlength="15"  @if(isset($usuario))value="{{ old('', mascaraTelefone($usuario->UsuarioCelular) ) }}"@endif />
            </div>
            <div class="form-group">
                <label for="senha">Senha do Usuario</label>
                <input type="text" class="form-control" name="UsuarioSenha" id="senha" />
            </div>
            <div class="form-group">
                <label for="confirmar_senha">Confirmar Senha do Usuario</label>
                <input type="text" class="form-control" name="ConfirmarUsuarioSenha" id="confirmar_senha" />
            </div>
            <div class="form-group">
                <label for="imagem"><b>Foto Usuario</b></label>
                <input type="file" class="form-control-file" name="image" id="image">
                <label for="imagem">Tamanho Máximo 1MB </label>
            </div>
            <div class="form-group">
                <img src="{{asset($usuario->UsuarioFoto)}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">OK</button>
            </div>
            @includeIf('components.dates', ['model' => $usuario])
        </form>
@endsection