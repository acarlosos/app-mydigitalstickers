@extends('layout.layout')

@section('title', ' Cadastro de escola Editar')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Cadastro de escola</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('escola.list') }}"> Cadastro de escola</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
    <form role="form" method="post" action="{{route('escola.update', $Escola->EscolaID)}}">
        @csrf
        @includeIf('escola.input')
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
    @includeIf('components.dates', ['model' => $Escola])
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script>
        $("#campoTelefone").mask("(99) 9999-9999");
        $("#campoCelular").mask("(99) 09999-9999");
        $("#campoCNPJ").mask("99.999.999/9999-99");
    </script>
@endsection
