@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('title', 'Cadastrar Usuário Escola')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastrar Usuário Escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('usuarioescola.list') }}">Lista Usuário Escola</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastrar Usuário Escola</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
    <form role="form" method="post" action="{{action('UsuarioEscolaController@store')}}">
        @csrf
            <div class="form-group">
                <label for="EscolaID">Escolas</label>
                <select class="form-control" name="EscolaID">
                    @foreach ( $Dados->EscolaID as $Escola )
                        <option value="{{$Escola->EscolaID}}">{{$Escola->Escola}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="UsuarioID">Usuarios</label>
                
                    @foreach ( $Dados->UsuarioNome as $Usuario )
                        <div class="i-checks">
                            <label>
                                <input type="checkbox" name="UsuarioNome[{{$Usuario->UsuarioID}}]" value="{{$Usuario->UsuarioID}}">
                                <i></i>{{$Usuario->UsuarioNome}}
                            </label>
                        </div>
                    @endforeach
            </div>
            <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="UsuarioEscolaStatus">
                        <option value="1">Ativo</option>
                    </select>
            </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>

            <fieldset disabled>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação: --/--/---- 00:00:00">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00">
                    </div>
                </div>
            </fieldset>
        </form>
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
