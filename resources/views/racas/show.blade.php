@extends('layouts.crud')

@section('crud')

<div class="row">
    <div class="col-md-12 text-center"> 
        <h1><b>Raças</b></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center"> 
        <h3>Visualização ({{ $raca->id }})</h3>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="" method="POST">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" value="{{ $raca->descricao }}" 
                            class="form-control" autocomplete="off" disabled autofocus>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('racas.index') }}"> Voltar</a>
                    </div>        
                </div>
            </div>
        </form>
    </div>
</div>
@endsection