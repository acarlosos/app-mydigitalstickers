@extends('layout.admin')


@section('title', 'Extrato da escola')

@section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Extrato da escola</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('escolacarteira.index') }}">Extrato da escola</a>
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
                    <form method="GET" action="{{route('escolacarteira.index')}}">
                        <div class="form-group">
                            <label for="EscolaID">Escolas</label>
                            <select class="form-control js-select-single" name="EscolaID" required >
                                @foreach ( $Escolas as $Escola )
                                    <option value ="{{$Escola->EscolaID}}" {{$EscolaID == $Escola->EscolaID ? 'selected' : ''}}>
                                        {{$Escola->Escola}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @includeIf('carteira.carteiraEscola')
@endsection
