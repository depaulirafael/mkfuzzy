@extends('layouts.crud')

@section('crud')

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

<div class="row">
    <div class="col-md-12 text-center"> 
        <h1><b>Regras</b></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center"> 
        <h3>Alteração ({{ $regra->id }})</h3><br/>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('regras.update',$regra->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-header">Antecedentes <strong>(SE)</strong></div>
                    <div class="card-body">

                    <!-- Conexao -->
                    <div class="form-group row">
                        <div class="col-md-12 offset-md-3">
                            <div class="form-check-inline">
                                <label><input type="radio" name="tipo_conexao" value="1" 
                                    @if ($regra->tipo_conexao==1) checked @endif>E</label>
                            </div>
                            <div class="form-check-inline">
                                <label><input type="radio" name="tipo_conexao" value="2"
                                    @if ($regra->tipo_conexao==2) checked @endif>OU</label>
                            </div>                                
                        </div>   
                    </div> 
                    <!-- Agua -->
                    <div class="form-group row">
                        <label for="termo_agua" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                            {{ __('Água:') }}
                        </label>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <select class="form-control" name="termo_agua" required autofocus>
                                <option value="1" @if ($regra->termo_agua==1) selected @endif>Ruim</option>
                                <option value="2" @if ($regra->termo_agua==2) selected @endif>Regular</option>
                                <option value="3" @if ($regra->termo_agua==3) selected @endif>Bom</option>
                                <option value="4" @if ($regra->termo_agua==4) selected @endif>Excelente</option>
                            </select>
                        </div>
                    </div>
                    <!-- Carboidratos -->
                    <div class="form-group row">
                        <label for="termo_carboidratos" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                            {{ __('Carboidratos:') }}
                        </label>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <select class="form-control" name="termo_carboidratos" required autofocus>
                                <option value="1" @if ($regra->termo_carboidratos==1) selected @endif>Ruim</option>
                                <option value="2" @if ($regra->termo_carboidratos==2) selected @endif>Regular</option>
                                <option value="3" @if ($regra->termo_carboidratos==3) selected @endif>Bom</option>
                                <option value="4" @if ($regra->termo_carboidratos==4) selected @endif>Excelente</option>
                            </select>
                        </div>
                    </div>
                    <!-- Proteinas -->
                    <div class="form-group row">
                        <label for="termo_proteinas" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                            {{ __('Proteínas:') }}
                        </label>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <select class="form-control" name="termo_proteinas" required autofocus>
                                <option value="1" @if ($regra->termo_proteinas==1) selected @endif>Ruim</option>
                                <option value="2" @if ($regra->termo_proteinas==2) selected @endif>Regular</option>
                                <option value="3" @if ($regra->termo_proteinas==3) selected @endif>Bom</option>
                                <option value="4" @if ($regra->termo_proteinas==4) selected @endif>Excelente</option>
                            </select>
                        </div>
                    </div>
                    <!-- Micronutrientes -->
                    <div class="form-group row">
                        <label for="termo_micronutrientes" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                            {{ __('Micronutrientes:') }}
                        </label>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <select class="form-control" name="termo_micronutrientes" required autofocus>
                                <option value="1" @if ($regra->termo_micronutrientes==1) selected @endif>Ruim</option>
                                <option value="2" @if ($regra->termo_micronutrientes==2) selected @endif>Regular</option>
                                <option value="3" @if ($regra->termo_micronutrientes==3) selected @endif>Bom</option>
                                <option value="4" @if ($regra->termo_micronutrientes==4) selected @endif>Excelente</option>
                            </select>
                        </div>
                    </div>
                    </div>
                </div>
                <br/>
                <div class="card">
                    <div class="card-header">Consequentes <strong>(ENTÃO)</strong></div>
                    <div class="card-body">

                    <!-- Resultado -->
                    <div class="form-group row">
                        <label for="termo_resultado" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                            {{ __('Resultado:') }}
                        </label>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <select class="form-control" name="termo_resultado" required autofocus>
                                <option value="1" @if ($regra->termo_resultado==1) selected @endif>Ruim</option>
                                <option value="2" @if ($regra->termo_resultado==2) selected @endif>Satisfatório</option>
                                <option value="3" @if ($regra->termo_resultado==4) selected @endif>Excelente</option>
                            </select>
                        </div>
                    </div>
                    </div>
                </div>
                <br/>
                <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('regras.index') }}"> Voltar</a>
                    </div>        
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">Gravar</button>
                    </div>    
                </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
