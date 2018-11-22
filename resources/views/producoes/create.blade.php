@extends('layouts.crud')

@section('head_js')
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/jquery.ui.autocomplete.html.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.pt-BR.js')}}"></script>
@endsection

@section('head_css')
    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet"> 
@endsection

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
        <h1><b>Estimativas de Produção</b></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center"> 
        <h3>Inclusão</h3><br/>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('producoes.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><strong>Animal</strong></div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="search" type="text" class="form-control" autocomplete="off"
                                        name="search" value="{{ old('search') }}" placeholder="Digite o Nome ou a Identificação..." required autofocus>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="id_animal" 
                                    class="col-xs-4 col-sm-4 col-md-3 col-form-label text-md-right">
                                    {{ __('Código:') }}
                                </label>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <input type="text" name="id_animal" id="id_animal" 
                                        class="form-control" value="{{ old('id_animal') }}" readonly required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nome" 
                                    class="col-xs-4 col-sm-4 col-md-3 col-form-label text-md-right">
                                    {{ __('Nome:') }}
                                </label>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <input type="text" name="nome" id="nome" 
                                        class="form-control" value="{{ old('nome') }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="card">
                        <div class="card-header"><strong>Dados</strong></div>
                        <div class="card-body">
                        
                            <div class="form-group row">
                                <label for="data" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                                    {{ __('Data:') }}
                                </label>
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <div class="input-group date form_date" 
                                         data-date="" 
                                         data-date-format="dd MM yyyy" 
                                         data-link-field="data" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" size="16" type="text" name="data_desc" 
                                               value="{{old('data_desc')}}" readonly>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                    <input type="hidden" id="data" name="data" value="{{old('data')}}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agua" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                                    {{ __('Água:') }}
                                </label>
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <input name="agua" type="number" step="0.01" class="form-control" 
                                        min="{{$agua->ruim_a}}" max="{{$agua->excelente_b}}"
                                        autocomplete="off" value="{{ old('agua') }}" required>
                                </div>
                                <label class="col-xs-2 col-sm-2 col-md-2 col-form-label text-md-left">Litros</label>
                            </div>
                            <div class="form-group row">
                                <label for="carboidratos" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                                    {{ __('Carboidratos:') }}
                                </label>
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <input name="carboidratos" type="number" step="0.01" class="form-control" 
                                        min="{{$carboidratos->ruim_a}}" max="{{$carboidratos->excelente_b}}"
                                        autocomplete="off" value="{{ old('carboidratos') }}" required>
                                </div>
                                <label class="col-xs-2 col-sm-2 col-md-2 col-form-label text-md-left">Quilos</label>
                            </div>
                            <div class="form-group row">
                                <label for="proteinas" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                                    {{ __('Proteínas:') }}
                                </label>
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <input name="proteinas" type="number" step="0.01" class="form-control" 
                                        min="{{$proteinas->ruim_a}}" max="{{$proteinas->excelente_b}}"
                                        autocomplete="off" value="{{ old('proteinas') }}" required>
                                </div>
                                <label class="col-xs-2 col-sm-2 col-md-2 col-form-label text-md-left">Quilos</label>
                            </div>
                            <div class="form-group row">
                                <label for="micronutrientes" class="col-xs-3 col-sm-3 col-md-3 col-form-label text-md-right">
                                    {{ __('Micronutrientes:') }}
                                </label>
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <input name="micronutrientes" type="number" step="0.01" class="form-control" 
                                    min="0" max="100"
                                    autocomplete="off" value="{{ old('micronutrientes') }}" required>
                                </div>
                                <label class="col-xs-2 col-sm-2 col-md-2 col-form-label text-md-left">%</label>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="pull-left">
                                <a class="btn btn-primary" href="{{ route('producoes.index') }}"> Voltar</a>
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

@section('script')
<script> 
    $('#search').keyup(function() {
        if (!this.value) {
            $('#id_animal').val('');
            $('#nome').val('');
        }
    });

    $(function()
    {
	    $("#search").autocomplete({
	        source: "{{route('autocomplete')}}",
            minLength: 3,
            autoFocus: true,
            html: true,
	        select: function(event, ui) {
                $('#id_animal').val(ui.item.id);
                $('#nome').val(ui.item.nome);
            }
	    });
    });
</script>

<script>
    $('.form_date').datetimepicker({
        language:  'pt-BR',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>    
@endsection