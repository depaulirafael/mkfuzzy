@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <!--<div class="card">
                <div class="card-body">-->
                    
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{ URL::asset('img/user.png') }}">
                        </div>    
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="E-mail"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Senha"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar-me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <i class="fa fa-btn fa-sign-in"></i> {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                <!--</div>
            </div>-->
        </div>
    </div>
</div>
@endsection
