@extends('layouts.app')

@section('head_js')
    <!-- Scripts -->
    <script src="{{asset('js/FlexGauge.js') }}"></script>
@endsection

@section('head_css')
        <!-- Styles -->
        <style>
            .panel-body .btn:not(.btn-block) { width:160px;margin-bottom:10px; }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .fg-dial {
                font-size: 150%;
                font-weight: bold;
                left: 0;
                position: absolute;
                text-align: center;
                top: 100px;
                 width: 100%;
            }
            .fg-dial-label {
                font-size: 150%;
                font-weight: bold;
                left: 0;
                position: absolute;
                text-align: center;
                top: 160px;
                width: 100%;
            }
        </style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">

        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 text-center">

            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                          <a href="{{ route('racas.index') }}" class="btn btn-warning btn-lg" role="button">
                            <span class="fa fa-list-alt"></span> <br/>Raças</a>
                          <a href="{{ route('animais.index') }}" class="btn btn-warning btn-lg" role="button">
                            <span class="fa fa-paw"></span> <br/>Animais</a>
                          <a href="{{ route('regras.index') }}" class="btn btn-primary btn-lg" role="button">
                            <span class="fa fa-cog"></span> <br/>Regras</a>
                          <a href="{{ route('resultado') }}" class="btn btn-primary btn-lg" role="button">
                            <span class="fa fa-thermometer-half"></span> <br/>Resultado</a>
                        </div>
                        <div class="col-xs-6 col-md-6">
                          <a href="{{ route('agua') }}" class="btn btn-primary btn-lg" role="button">
                            <span class="fa fa-thermometer-half"></span> <br/>Água</a>
                          <a href="{{ route('carboidratos') }}" class="btn btn-primary btn-lg" role="button">
                            <span class="fa fa-thermometer-half"></span> <br/>Carboidratos</a>
                          <a href="{{ route('proteinas') }}" class="btn btn-primary btn-lg" role="button">
                            <span class="fa fa-thermometer-half"></span> <br/>Proteínas</a>
                          <a href="{{ route('micronutrientes') }}" class="btn btn-primary btn-lg" role="button">
                            <span class="fa fa-thermometer-half"></span> <br/>Micronutrientes</a>
                        </div>
                    </div>
                </div>
            </div>

                </div>
            </div>
            <!--
            <div class="row">
                <div class="col-md-4 offset-md-4 text-center"> 
                    <div class="col-md-12" id="termometro">
                    </div>
                </div>    
            </div>
            -->
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" id="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ $message }}
            </div>
        @endif

    </div>
</div>

@endsection

@section('script')
    <script>
    var gauge = new FlexGauge({
        appendTo: '#termometro',
        dialValue: true,
        dialLabel: true,
        elementWidth: 200,
        elementHeight: 200,
        animateSpeed: 10,
        arcStrokeFg: 10,
        arcStrokeBg: 10,
        arcFillPercent: 0.99
    });
    </script>
@endsection