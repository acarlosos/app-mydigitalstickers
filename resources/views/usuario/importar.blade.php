@extends('layout.admin')

@section('title', 'Lista Usuário')

@section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Cadastro de usuário</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('usuario.list')}}">Cadastro de usuário</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Importação de Alunos</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@endsection
@section('content')

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content p-md">
                @if (session('erro'))
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <p>{{ session('erro') }}</p>
                    </div>
                @endif
                @if (session('erroslist'))
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        @foreach(session('erroslist') as $error)
                        <p>{{  $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="alert alert-warning alert-dismissable" style="display:none" id="enviado-arquivo">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Importação em anadamento!
                </div>
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <div class="form-group">
                        <form role="form" id="my-form" method="post" enctype="multipart/form-data"
                            action="{{ route('usuario.importarGravar') }}">
                            {{ csrf_field() }}
                            @if(is_null($Escola))
                                <div class="form-group">
                                    <label for="EscolaID">Escola</label>
                                    <select class="form-control" name="EscolaID">
                                        @foreach ( $Escolas as $Escola )
                                            <option value="{{$Escola->EscolaID}}">{{$Escola->Escola}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <input type="hidden" name="EscolaID" id="EscolaID" value="{{$Escola->EscolaID}}">
                            @endif
                            <h4 for="exampleInputPassword1">Arquivo a ser importado</h4>
                            <input type="file" class="form-control-file" name="importcsv" id="importcsv" required>
                            <br>
                            <hr>

                            <div class="form-group">
                                <h3 for="exampleInputPassword1">Formato Excel <a  href="{{route('usuario.modelo')}}" class="btn btn-sm ml-3 btn-warning">Download Arquivo Exemplo</a></h3>
                            </div>
                            <hr>
                            <button type="submit" onclick="showMessage()" class="btn btn-primary">Importar aluno</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script >
        document.getElementById("my-form").onsubmit = function() {
            document.getElementById('enviado-arquivo').style.display = 'block'
        };
        function showMessage(){
            document.getElementById('enviado-arquivo').style.display = 'block'
        }
    </script>
@endsection