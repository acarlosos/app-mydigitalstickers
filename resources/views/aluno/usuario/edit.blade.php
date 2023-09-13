@extends('layout.app')
@section('content')
<br><br>
    <div class="box m-4 mt-5">
        <img src="{{asset('vendor/img/gato.png')}}" class="sgato">
        <img src="{{asset('vendor/img/pizza.png')}}" class="spizza">
        <form method="post" action="{{ route('usuario.update', $usuario->UsuarioID )}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="UsuarioNome" value="{{$usuario->UsuarioNome}}">
            <input type="hidden" name="UsuarioStatus" value="{{$usuario->UsuarioStatus}}">
            <input type="hidden" name="UsuarioLogin" value="{{$usuario->UsuarioLogin}}">
            <input type="hidden" name="PerfilID" value="{{$usuario->PerfilID}}">
            <div class="row">
                <div class="col-12 col-md-6">
                    <label>Login</label>
                    <div class="textoPadrao">{{$usuario->UsuarioLogin}}</div>
                </div>
                <div class="col-12 col-md-6">
                    <label>Nome</label>
                    <div class="textoPadrao">{{$usuario->UsuarioNome}}</div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6">
                    <label>Telefone</label>
                    <input type="text" name="UsuarioCelular" id="UsuarioCelular"  value="{{ old('UsuarioCelular') ?? mascaraTelefone($usuario->UsuarioCelular) }}" placeholder="" autocomplete="off" required>
                </div>
                <div class="col-12 col-md-6">
                    <label>Email</label>
                    <input type="email" name="UsuarioEmail" id="UsuarioEmail" placeholder="" value="{{ old('UsuarioEmail') ?? $usuario->UsuarioEmail}}" autocomplete="off" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <label>Nova senha</label>
                    <input type="password" name="UsuarioSenha" placeholder="" autocomplete="off">
                </div>
                <div class="col-12 col-md-6">
                    <label>Confirmar nova senha</label>
                    <input type="password" name="UsuarioSenhaConfirm" placeholder="" autocomplete="off">
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-12 col-md-6">
                    <label>Foto Usuário</label> <br>
                    <label for="UsuarioFoto" class="bt" id="btFoto">Escolher Foto</label>
                    <input type="file"  id="UsuarioFoto" name="UsuarioFoto">
                    <small id="UsuarioFotoFileName"></small><br />
                    <small style="color:#80cbd9;" id="UsuarioFotoNotify">Arquivos .gif, .png, .jpg, .jpeg etc. até 1MB</small>
                </div>
            </div>

            <style>
                #UsuarioFoto {
                    opacity: 0;
                    position: absolute;
                    z-index: -1;
                }
                label {
                    cursor: pointer;
                }
            </style>
            <script>
                const photo = document.getElementById('UsuarioFoto');

                photo.addEventListener("change", (event) => {
                    document.getElementById('UsuarioFotoFileName').innerHTML = photo.files[0].name
                });
                const btFoto = document.getElementById('btFoto');
                const notify = document.getElementById('UsuarioFotoNotify');
                btFoto.addEventListener("mouseover", (event) => {
                    notify.style.color = '#098bfa'
                });
                btFoto.addEventListener("mouseout", (event) => {
                    notify.style.color = '#80cbd9'
                });
            </script>
            <hr>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="bt float-right">Alterar dados</button>
                </div>
            </div>
        </form>
    </div>
@endsection
