@extends('layout.layout')

@section('title', 'Editar compra')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Compra</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('alunocompra.list') }}">Compra</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Informar pontos</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{url('alunocompra/update/'.$alunocompra->AlunoCompraID)}}">
            @csrf
            <div class="form-group">
                <label for="UsuarioEscolaID">Nome do Aluno</label>
                <select class="form-control" name="UsuarioEscolaID">
                        <option value="">Selecione o aluno</option>
                    @foreach ( $alunocompra->UsuarioEscola as $UsuarioEscola )
                        <option @if ($UsuarioEscola->UsuarioEscolaID == $alunocompra->UsuarioEscolaID) selected @endif value="{{$UsuarioEscola->UsuarioEscolaID}}">
                            {{$UsuarioEscola->UsuarioNome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="validationCustom01">Pontos</label>
                <input type="text" class="form-control" name="AlunoCompraQuantidade" id="validationCustom01" required @if(isset($alunocompra))value="{{ old('', $alunocompra->AlunoCompraQuantidade) }}"@endif placeholder="Pontos" />
                <div class="valid-feedback">Tudo certo!</div>
            </div>
            <input type="hidden" name="AlunoCompraStatus" value="1">
            <input type="hidden"
                id="disabledTextInput"
                class="form-control"
                placeholder="Data Ativação:   --/--/---- 00:00:00"
                @if(isset($alunocompra->AlunoCompraDTAtivacao) && $alunocompra->AlunoCompraDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($alunocompra->AlunoCompraDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
            <button type="submit" class="btn btn-primary">OK</button>
        </form>
@endsection