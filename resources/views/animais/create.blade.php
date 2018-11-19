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
        <h1><b>Animais</b></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center"> 
        <h3>Inclusão</h3>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('animais.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="identificacao">Identificação</label>
                        <input type="text" name="identificacao" value="{{ old('identificacao') }}" 
                            class="form-control" autocomplete="off" required autofocus>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" value="{{ old('nome') }}"  
                            class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="id_raca">Raça</label>
                        <select class="form-control" name="id_raca" required>
                        @if (isset($racas))
                            @foreach ($racas as $raca)
                                <option value="{{$raca->id}}"
                                @if (old('id_raca')==$raca->id) selected @endif>{{$raca->descricao}}</option>
                            @endforeach
                        @endif
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-left">
                        <a class="btn btn-primary" href="{{ route('animais.index') }}"> Voltar</a>
                    </div>        
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">Gravar</button>
                    </div>    
                </div>
            </div>
        </form>
    </div>
</div>
@endsection