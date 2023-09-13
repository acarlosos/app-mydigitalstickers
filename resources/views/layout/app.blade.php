<!DOCTYPE html>
<html>

<head>
    <link rel="apple-touch-icon" sizes="180x180" href="vendor/img/pandaFeliz.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendor/img/pandaFeliz.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendor/img/pandaFeliz.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">

    <title>{{env('APP_NAME')}} - Home</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link href="http://mydigitalstickers.com/font-awesome/css/font-awesome.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;900&display=swap" rel="stylesheet">

    <link href="{{asset('vendor/css/estilo.css')}}" rel="stylesheet" />



</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side barraLateral" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">

                    <li class="nav-header2">
                        <img src="{{asset('vendor/img/logo.png')}}"  alt="" class="logo">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle thumbUser mt-4 mb-2"
                                src="{{auth()->user()->UsuarioFoto}}" />
                            <span class="block m-t-xs font-bold">{{auth()->user()->UsuarioNome}}</span>
                            <span class="text-xs block">{{session()->get('Escola')}}</span>
                        </div>
                    </li>

                    <li class="bt mx-2 {{ativo('home', 'active')}}">
                        <a href="{{route('home')}}">
                            <i class="fas fa-home"></i>
                            <span class="nav-label">Home</span>
                        </a>
                    </li>

                    <li class="bt mx-2 mt-3 {{ativo('usuario', 'active')}}">
                        <a href="{{ route('usuario.editar', ['id' => session()->get('UsuarioID')]) }}">
                            <i class="fas fa-user"></i>
                            <span class="nav-label">Usuário</span>
                        </a>
                    </li>

                    <li class="bt mx-2 mt-3 {{ativo('alunocompra', 'active')}}">
                        <a href="{{route('alunocompra.index')}}">
                            <i class="fas fa-award"></i>
                            <span class="nav-label"> {{session()->get('EscolaNomeMoeda') ?? 'Stickers'}} >> Presentes</span>
                        </a>
                    </li>

                    <li class="bt mx-2 mt-3  {{ativo('carteira', 'active')}}">
                        <a href="{{route('carteira.index')}}">
                            <i class="fas fa-list-ul"></i>
                            <span class="nav-label">Extrato</span>
                        </a>
                    </li>
                    <li class="bt mx-2 mt-3  ">
                        <a target="_blank" href="mailto:support@mydigitalstickers.freshdesk.com?subject=Pandinha, me ajuda no My Digital Stickers! {{session()->get('UsuarioEmail')}}&body=Descreva como o Pandinha pode ajudá-lo.">
                            <i class="fas fa-question"></i>
                            <span class="nav-label">Ajuda</span>
                        </a>
                    </li>
                    <li class="bt mx-2 mt-3  ">
                        <a href="/logout">
                            <i class="fas fa-sign-out"></i>
                            <span class="nav-label">Sair</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="bgInterna" style="overflow-y: auto!important;height: 100px">
            <div class="row border-bottom">
                <!-- nav topo-->
                <nav class="navbar navbar-static-top bgInterna" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group" style="display: none">
                                <input type="text" placeholder="Search for something..." class="form-control"
                                    name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="p-1">
                            <img src="{{asset('vendor/img/logo.png')}}" alt="" class="logoMobile">
                        </li>
                    </ul>
                </nav>
                <!-- fim nav topo-->
            </div>

            @yield('content')

        </div>

    </div>

    <div class="rodaInterna">
        <img src="{{asset('vendor/img/fundo.svg')}}" alt="" class="roda">
    </div>


    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-select-single').select2();
        });
    </script>
</body>

</html>