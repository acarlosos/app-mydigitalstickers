@extends('layout.layout')
@section('style')
    <link href="{{ url('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section('title', 'Editar perfil x tela')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Associar perfil x tela</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('perfiltela.list') }}"> Associar perfil x tela</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
@endsection

@section('content')
        <form role="form" method="post" action="{{url('perfiltela/update/'.$PerfilTelas['IDS'][0]->PerfilID)}}">
            @csrf
                <div class="form-group">
                    <label for="PerfilID">Perfil</label>
                    <select class="form-control">
                        <option selected>{{$PerfilTelas['IDS'][0]->Perfil}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="TelaID">Tela</label>
                    <div class="form-check">

                        @foreach ( $PerfilTelas['Telas'] as $Tela )
                            <div class="i-checks">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="TelaID[{{$Tela->TelaID}}]" value="{{$Tela->TelaID}}"
                                    @if(isset($PerfilTelas[0]) && count($PerfilTelas[0]) > 0)
                                        @foreach ( $PerfilTelas[0] as $PerfilTela )
                                            @if($Tela->TelaID == $PerfilTela->TelaID) checked @endif
                                        @endforeach
                                    @endif
                                    >
                                    <i></i> {{$Tela->Tela}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" name="PerfilTelaStatus">
                        <option value="1" @if(isset($PerfilTelas['IDS'][0]->PerfilTelaStatus) && $PerfilTelas['IDS'][0]->PerfilTelaStatus == 1)selected @endif>Ativo</option>
                        <option value="2" @if(isset($PerfilTelas['IDS'][0]->PerfilTelaStatus) && $PerfilTelas['IDS'][0]->PerfilTelaStatus == 2)selected @endif>Inativo</option>
                        <option value="3" @if(isset($PerfilTelas['IDS'][0]->PerfilTelaStatus) && $PerfilTelas['IDS'][0]->PerfilTelaStatus == 3)selected @endif>Bloqueado</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">OK</button>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Ativação:   --/--/---- 00:00:00"
                                @if(isset($PerfilTelas['IDS'][0]->PerfilTelaDTAtivacao) && $PerfilTelas['IDS'][0]->PerfilTelaDTAtivacao != '') value="Data Ativação: {{ \Carbon\Carbon::parse($PerfilTelas['IDS'][0]->PerfilTelaDTAtivacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Inativação:   --/--/---- 00:00:00"
                                @if(isset($PerfilTelas['IDS'][0]->PerfilTelaDTInativacao) && $PerfilTelas['IDS'][0]->PerfilTelaDTInativacao != '') value="Data Inativação: {{ \Carbon\Carbon::parse($PerfilTelas['IDS'][0]->PerfilTelaDTInativacao)->format('d/m/Y H:i:s') }} "@endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Data Bloqueio:   --/--/---- 00:00:00"
                                @if(isset($PerfilTelas['IDS'][0]->PerfilTelaDTBloqueio) && $PerfilTelas['IDS'][0]->PerfilTelaDTBloqueio != '') value="Data Bloqueio: {{ \Carbon\Carbon::parse($PerfilTelas['IDS'][0]->PerfilTelaDTBloqueio)->format('d/m/Y H:i:s') }} "@endif>
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
