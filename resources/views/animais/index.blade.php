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
        <h1><b>Animais</b></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{route('animais.create')}}" class="btn btn-default btn-sm pull-right">
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
                        <th class="text-center" width="100px">Código</th>
                        <th>Identificação</th>
                        <th>Nome</th>
                        <th class="text-center" width="100px">Ações</th>                
                    </tr>
                </thead>
                <tbody>
                @foreach($animais as $animal)
                    <tr>
                        <td class="text-center">{{$animal->id}}</td>
                        <td>{{$animal->identificacao}}</td>
                        <td>{{$animal->nome}}</td>
                        <td class="text-center">
                            <form action="{{ route('animais.destroy',$animal->id) }}" method="POST">
                                <a data-toggle="tooltip" data-placement="top" title="Exibir"
                                   href="{{ route('animais.show',$animal->id) }}">
                                    <i class="fa fa-eye"></i></a>
                                &nbsp;
                                <a data-toggle="tooltip" data-placement="top" title="Alterar"
                                   href="{{ route('animais.edit',$animal->id) }}">
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
    {!! $animais->links() !!}
</div>
@endsection