@extends('layout.auth')
@section('content')
<form class="m-t" role="form" action="{{ route('forgot.auth') }}" method="POST">
    @csrf
    <div id="login" class="d-flex justify-content-center align-items-center">
        <div class="conteudo">
            <img src="{{asset('vendor/img/logo.png')}}" alt="" class="logo">
            <div class="box">
                <div>
                    <input type="text" name="UsuarioLogin" value="{{old('UsuarioLogin')}}" required placeholder="USUÁRIO">
                </div>
                <div>
                    <button type="submit" class="btLogin mt-5">ENVIAR NOVA SENHA</button>
                </div>
                <div class="esqueciMinhaSenhaDiv">
                    <a href="{{route('home')}}" class="esqueciMinhaSenha">Voltar</a>
                </div>
                <div class="esqueciMinhaSenhaDiv">
                    @if(Session::has('status'))
                        <span class="" style="color:#098bfa!important">{!! Session::get('status') !!}</span>
                    @endif
                    @if($errors->any())
                        <span class="text-danger">{{$errors->first()}}</span>
                    @endif
                </div>
            </div>
        </div>
        <img src="{{asset('vendor/img/fundo.svg')}}" alt="" class="roda">
    </div>
</form>
@endsection