@extends('layouts.crud')

@section('crud')

<div class="row">
    <div class="col-md-12 text-center"> 
        <h1><b>Animais</b></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center"> 
        <h3>Visualização ({{ $animal->id }})</h3>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="identificacao">Identificação</label>
                        <input type="text" name="identificacao" value="{{ $animal->identificacao }}" 
                            class="form-control" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" value="{{ $animal->nome }}" 
                            class="form-control" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="id_raca">Raça</label>
                        <select class="form-control" name="id_raca" disabled>
                        @if (isset($racas))
                            @foreach ($racas as $raca)
                                <option value="{{$raca->id}}"
                                @if ($animal->id_raca==$raca->id) selected @endif>{{$raca->descricao}}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('animais.index') }}"> Voltar</a>
                    </div>  
                </div>
            </div>
        </form>
    </div>
</div>
@endsection