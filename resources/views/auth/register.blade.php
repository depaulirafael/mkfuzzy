@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                    <h1><b>Registrar</b></h1><br/>
                </div>
            </div> 
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome:') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" autocomplete="off" 
                                    name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail:') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" autocomplete="off" 
                                    name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha:') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" 
                                    name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma Senha:') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" 
                                    name="password_confirmation" required>
                            </div>
                        </div>

                    </div>
                </div>
                <br/>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('home') }}"> Voltar</a>
                        </div>        
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
