@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" id="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message }}
        </div>
    @endif


            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
