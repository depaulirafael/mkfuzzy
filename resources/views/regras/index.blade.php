@php
    function TermoA($termo) {
        switch ($termo) {
            case 1:
                return "Ruim";
                break;
            case 2:
                return "Regular";
                break;
            case 3:
                return "Bom";
                break;
            case 4:
                return "Excelente";
                break;
            default: 
                return "";   
        }
    }

    function TermoC($termo) {
        switch ($termo) {
            case 1:
                return "Ruim";
                break;
            case 2:
                return "Satisfatório";
                break;
            case 3:
                return "Excelente";
                break;
            default: 
                return "";   
        }
    }

    function Conector($con) {
        switch ($con) {
            case 1:
                return " E ";
                break;
            case 2:
                return " OU ";
                break;
            default: 
                return " ";
        }
    }

    function Negacao($con) {
        if ($con == 1) {
            return "Não ";
        } else {
            return "";
        }
    }
@endphp

@extends('layouts.crud')

@section('crud')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" id="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message }}
        </div>
    @endif

<div class="row">
    <div class="col-md-12 text-center"> 
        <h1><b>Regras</b></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{route('regras.create')}}" class="btn btn-default btn-sm pull-right">
            <i class="fa fa-plus"></i> Adicionar</a>
        <a href="" class="btn btn-default btn-sm pull-right">
            <i class="fa fa-book"></i> Relatório</a>
    </div>           
</div>
<br />
<div class="row">
    <div class="col-md-12"> 
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Código</th>
                        <th>Antecedentes</th>
                        <th>Consequentes</th>
                        <th class="text-center" width="100px">Ações</th>                
                    </tr>
                </thead>
                <tbody>
                @foreach($regras as $regra)
                    <tr>
                        <td class="text-center" width="100px">{{$regra->id}}</td>
                        <td>
                        @php
                            $str_regra = '';
                            if ($regra->termo_agua > 0) {
                                $str_regra .= '(Água = '.Negacao($regra->not_agua).TermoA($regra->termo_agua).')';
                            }
                            if ($regra->termo_carboidratos > 0) {
                                if ($str_regra <> '') {
                                    $str_regra .= Conector($regra->tipo_conexao);    
                                }
                                $str_regra .= '(Carboidratos = '.Negacao($regra->not_carboidratos).TermoA($regra->termo_carboidratos).')';
                            }
                            if ($regra->termo_proteinas > 0) {
                                if ($str_regra <> '') {
                                    $str_regra .= Conector($regra->tipo_conexao);    
                                }
                                $str_regra .= '(Proteínas = '.Negacao($regra->not_proteinas).TermoA($regra->termo_proteinas).')';
                            }
                            if ($regra->termo_micronutrientes > 0) {
                                if ($str_regra <> '') {
                                    $str_regra .= Conector($regra->tipo_conexao);    
                                }
                                $str_regra .= '(Micronutrientes = '.Negacao($regra->not_micronutrientes).TermoA($regra->termo_micronutrientes).')';
                            }
                            echo $str_regra;
                        @endphp
                        </td>
                        <td>(Resultado = {{Negacao($regra->not_resultado).TermoC($regra->termo_resultado)}})</td>
                        <td class="text-center">
                            <form action="{{ route('regras.destroy',$regra->id) }}" method="POST">
                                <a data-toggle="tooltip" data-placement="top" title="Exibir"
                                   href="{{ route('regras.show',$regra->id) }}">
                                    <i class="fa fa-eye"></i></a>
                                &nbsp;
                                <a data-toggle="tooltip" data-placement="top" title="Alterar"
                                   href="{{ route('regras.edit',$regra->id) }}">
                                    <i class="fa fa-pencil"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: Transparent;
                                                             background-repeat:no-repeat;
                                                             border: none;
                                                             cursor:pointer;
                                                             overflow: hidden;
                                                             outline:none;">
                                    <a data-toggle="tooltip" data-placement="top" title="Excluir">
                                        <i class="fa fa-trash-o"></i></a>
                                </button>
                            </form>
                        </td>             
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    {!! $regras->links() !!}
</div>
@endsection