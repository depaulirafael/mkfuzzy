@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 text-center"> 
                    <h1><b>Água</b></h1>
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
            <form method="POST" action="{{ route('agua') }}">
                @csrf
                <div class="form-group row">
                    <label for="ruim_a" class="col-md-3 col-form-label text-md-right">{{ __('Ruim:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="ruim_a" step="0.01"
                            value="{{$agua->ruim_a}}" autocomplete="off" required>
                    </div>
                    <label for="ruim_b" class="col-md-2 col-form-label text-md-right">{{ __('Até:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="ruim_b" step="0.01" 
                        value="{{$agua->ruim_b}}" autocomplete="off" required>
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="regular_a" class="col-md-3 col-form-label text-md-right">{{ __('Regular:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="regular_a" step="0.01" 
                        value="{{$agua->regular_a}}" autocomplete="off" required>
                    </div>
                    <label for="regular_c" class="col-md-2 col-form-label text-md-right">{{ __('Até:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="regular_c" step="0.01" 
                        value="{{$agua->regular_c}}" autocomplete="off" required>
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="bom_a" class="col-md-3 col-form-label text-md-right">{{ __('Bom:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="bom_a" step="0.01"
                        value="{{$agua->bom_a}}" autocomplete="off" required>
                    </div>
                    <label for="bom_c" class="col-md-2 col-form-label text-md-right">{{ __('Até:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="bom_c" step="0.01"
                        value="{{$agua->bom_c}}" autocomplete="off" required>
                    </div>  
                </div>
                <div class="form-group row">
                    <label for="excelente_a" class="col-md-3 col-form-label text-md-right">{{ __('Excelente:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="excelente_a" step="0.01"
                        value="{{$agua->excelente_a}}" autocomplete="off" required>
                    </div>
                    <label for="excelente_b" class="col-md-2 col-form-label text-md-right">{{ __('Até:') }}</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="excelente_b" step="0.01"
                        value="{{$agua->excelente_b}}" autocomplete="off" required>
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