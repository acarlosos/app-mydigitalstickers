@extends('layout.auth')
@section('content')
<form class="m-t" role="form" action="{{ route('login') }}" method="POST">
    @csrf
    <div id="login" class="d-flex justify-content-center align-items-center">
        <div class="conteudo">
            <img src="{{asset('vendor/img/logo.png')}}" alt="" class="logo">
            <div class="box">
                <div>
                    <input type="text" name="UsuarioLogin" value="{{old('UsuarioLogin')}}" required placeholder="USUÁRIO">
                </div>
                <div>
                    <input type="password" placeholder="SENHA" name="UsuarioSenha"  required class="mt-2">
                </div>
                <div>
                    <button type="submit" class="btLogin mt-5">ENTRAR </button>
                </div>
                <div class="esqueciMinhaSenhaDiv">
                    <a href="{{route('forgot.password')}}" class="esqueciMinhaSenha">Esqueci minha senha</a>
                </div>
                <div class="esqueciMinhaSenhaDiv">
                    @if(Session::has('status'))
                        <span class="text-danger">{!! Session::get('status') !!}</span>
                    @endif
                </div>
            </div>
        </div>
        <img src="{{asset('vendor/img/fundo.svg')}}" alt="" class="roda">
    </div>
</form>
@endsection