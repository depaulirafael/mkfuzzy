@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 text-center"> 
                    <h1><b>Resultado</b></h1>
                </div>
            </div>  

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible" id="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Ops!</strong> Houve alguns problemas.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

            <div class="form-group row">
                <div class="col-md-6 offset-md-3">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Atenção!</strong> Valores em LITROS.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('resultado') }}">
                @csrf
                <div class="form-group row">
                    <label for="ruim_a" class="col-md-3 col-form-label text-md-right">{{ __('Ruim:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="ruim_a" step="0.01"
                            value="{{$resultado->ruim_a}}" autocomplete="off" required>
                    </div>
                    <label for="ruim_b" class="col-md-2 col-form-label text-md-right">{{ __('Até:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="ruim_b" step="0.01" 
                        value="{{$resultado->ruim_b}}" autocomplete="off" required>
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="satisfatorio_a" class="col-md-3 col-form-label text-md-right">{{ __('Satisfatório:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="satisfatorio_a" step="0.01" 
                        value="{{$resultado->satisfatorio_a}}" autocomplete="off" required>
                    </div>
                    <label for="satisfatorio_c" class="col-md-2 col-form-label text-md-right">{{ __('Até:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="satisfatorio_c" step="0.01" 
                        value="{{$resultado->satisfatorio_c}}" autocomplete="off" required>
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="excelente_a" class="col-md-3 col-form-label text-md-right">{{ __('Excelente:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="excelente_a" step="0.01"
                        value="{{$resultado->excelente_a}}" autocomplete="off" required>
                    </div>
                    <label for="excelente_b" class="col-md-2 col-form-label text-md-right">{{ __('Até:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="excelente_b" step="0.01"
                        value="{{$resultado->excelente_b}}" autocomplete="off" required>
                    </div>  
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('home') }}"> Voltar</a>
                        </div>        
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success">Gravar</button>
                        </div>    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection