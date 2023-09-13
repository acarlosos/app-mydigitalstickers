@extends('layout.admin')

@section('title', 'Extrato do aluno')

@section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Extrato do aluno</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('carteira.index') }}">Extrato do aluno</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection
@section('content')
    <div class="row  mt-3">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content p-md">
                    <form method="POST" action="{{route('carteira.search')}}">
                        @csrf
                        <div class="form-group">
                            <label for="UsuarioID">Aluno</label>
                            <select class="form-control js-select-single" name="UsuarioID" required >
                                <option value="">Selecione o aluno</option>
                                @foreach ( $Usuarios as $user )
                                    <option value ="{{$user->UsuarioID}}" {{$UsuarioID == $user->UsuarioID ? 'selected' : ''}}>
                                    {{$user->Escola}} - {{$user->UsuarioNome}} ({{$user->UsuarioLogin}})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @includeIf('carteira.carteira')
@endsection


