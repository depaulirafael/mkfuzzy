@extends('layouts.crud')

@section('crud')

<div class="row">
    <div class="col-md-12 text-center"> 
        <h1><b>Estimativas de Produção</b></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center"> 
        <h3>Visualização ({{ $producao->id }})</h3>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="" method="POST">

            <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label for="data" class="col-md-3 col-form-label text-md-right">{{ __('Data:') }}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="data"
                            value="{{ Carbon\Carbon::parse($producao->data)->format('d/m/Y') }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="animal" class="col-md-3 col-form-label text-md-right">{{ __('Animal:') }}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="animal"
                        value="{{$producao->identificacao}}" readonly>
                    </div>
                </div>

                            <div class="form-group row">
                                <label for="agua" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                                    {{ __('Água:') }}
                                </label>
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <input name="agua" type="number" step="0.01" class="form-control" 
                                        value="{{$producao->agua}}" readonly>
                                </div>
                                <label class="col-xs-2 col-sm-2 col-md-2 col-form-label text-md-left">Litros</label>
                            </div>
                            <div class="form-group row">
                                <label for="carboidratos" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                                    {{ __('Carboidratos:') }}
                                </label>
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <input name="carboidratos" type="number" step="0.01" class="form-control" 
                                        value="{{$producao->carboidratos}}" readonly>
                                </div>
                                <label class="col-xs-2 col-sm-2 col-md-2 col-form-label text-md-left">Quilos</label>
                            </div>
                            <div class="form-group row">
                                <label for="proteinas" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                                    {{ __('Proteínas:') }}
                                </label>
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <input name="proteinas" type="number" step="0.01" class="form-control" 
                                        value="{{$producao->proteinas}}" readonly>
                                </div>
                                <label class="col-xs-2 col-sm-2 col-md-2 col-form-label text-md-left">Quilos</label>
                            </div>
                            <div class="form-group row">
                                <label for="micronutrientes" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                                    {{ __('Micronutrientes:') }}
                                </label>
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <input name="micronutrientes" type="number" step="0.01" class="form-control" 
                                        value="{{$producao->micronutrientes}}" readonly>
                                </div>
                                <label class="col-xs-2 col-sm-2 col-md-2 col-form-label text-md-left">%</label>
                            </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-3">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <h4>Estimativa de Produção</h4>
                                <h1 class="display-4">{{number_format($producao->resultado, 2,',','')}} 
                                    <small>Litros</small></h1>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" 
                                        aria-valuenow="{{number_format($producao->percentual)}}" aria-valuemin="0" aria-valuemax="100" 
                                        style="width: {{number_format($producao->percentual)}}%;">
                                    </div>
                                </div>
                                <p>{{number_format($producao->percentual, 2, ',', '')}}% da produção máxima.</p>
                            </div>    
                        </div>
                    </div>
                </div>
                @if ($producao->producao_real > 0)
                <div class="form-group row">
                    <label for="producao_real" class="col-md-3 col-form-label text-md-right">{{ __('Produção Real:') }}</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="producao_real"
                            value="{{number_format($producao->producao_real, 2,',','')}}" readonly>
                    </div>
                </div>
                @endif
            </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('producoes.index') }}">{{ __('Voltar') }}</a>
                    </div>        
                </div>
            </div>
        </form>
    </div>
</div>
@endsection