@extends('layout.layout')

@section('title', 'Cadastro de informativo de acesso ')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de informativo de acesso </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('informativoacesso.list') }}">Lista informativo de acesso </a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cadastro de informativo de acesso </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
    <form role="form" method="post" action="{{action('InformativoAcessoController@store')}}">
        @csrf
        @include('informativoacesso.input')
    </form>  
@endsection
    