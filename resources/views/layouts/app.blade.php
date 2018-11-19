<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MkFuzzy') }}</title>

    <!-- Favicon -->
    <link href="{{URL::asset('favicon.ico')}}" rel="shortcut icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/ajax.js')}}"></script>
    <script src="{{URL::asset('js/lightbox.js')}}"></script>

    <!-- Fonts -->
    <link href="{{URL::asset('css/font-family-nunito.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <style>
        #up {  
            position: fixed;
            bottom: 3%; 
            right: 3%; 
            cursor: pointer;
        }
        #alert {  
            position: fixed;
            bottom: 9%; 
            right: 3%;
        }
        .alert {    
            margin: auto;  
            z-index: 20;   
            text-align: center;   
        }
        .alert-success {
            color: #fff;
            background-color: #228B22;
        }
        .alert-warning {
            color: #fff;
            background-color: #EEAD0E;
        }
        .alert-danger {
            color: #fff;
             background-color: #FF3030;
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">

                <a class="navbar-brand" @guest href="{{ url('/') }}" @else href="{{ url('/home') }}" @endguest>
                    <img alt="Brand" src="{{ URL::asset('img/brand.png') }}">
                    <b>{{ config('app.name', 'MkFuzzy') }}</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fa fa-percent"></i>  {{ __('Estimativas de Produção') }}</a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                <i class="fa fa-sign-in"></i>  {{ __('Entrar') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-list"></i>  {{ __('Cadastros') }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('racas.index') }}">{{ __('Raças') }}</a>
                                    <a class="dropdown-item" href="{{ route('animais.index') }}">{{ __('Animais') }}</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-cog"></i>  {{ __('Configurações') }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('regras.index') }}">{{ __('Regras') }}</a>
                                    <a class="dropdown-item" href="{{ route('agua') }}">{{ __('Água') }}</a>
                                    <a class="dropdown-item" href="{{ route('carboidratos') }}">{{ __('Carboidratos') }}</a>
                                    <a class="dropdown-item" href="{{ route('proteinas') }}">{{ __('Proteínas') }}</a>
                                    <a class="dropdown-item" href="{{ route('micronutrientes') }}">{{ __('Micronutrientes') }}</a>
                                    <a class="dropdown-item" href="{{ route('resultado') }}">{{ __('Resultado') }}</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i>  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user') }}">{{ __('Dados Cadastrais') }}</a>
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
            
        @yield('body')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <img src="{{URL::asset('img/subir.png')}}" id="up" style="display: none;" title="Topo">

    @yield('script') 

    <script>
        $("#alert").fadeTo(5000, 500).slideUp(500, function(){
            $("#alert").slideUp(500);
        });
    </script>   
</body>
</html>
