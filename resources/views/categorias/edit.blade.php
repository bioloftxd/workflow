@extends('layouts.master')

@section('title')
{{$categoria->nome}}
@endsection
@push('links')
    <link rel="stylesheet" href="/css/categorias.css">
@endpush

@section('content')

<div class="container">
<form method="POST" action="{{route('categorias.update',["id"=>$categoria->id])}}">
    {{csrf_field()}}
     {{method_field("PUT")}}
    <div class="form-row">
        <div class="form-group col-md-11">
            <input type="text" name="nome" class="form-control" required="" value="{{$categoria->nome}}">
        </div>
        <div class="form-group col-md-1">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>
<br><br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
    		<th>Nome Categoria</th>
			<th style="text-align: right">Ação</th>
    	</tr>
    </thead>
    <tbody>
    	@foreach ($categorias as $categoria)
    	<tr>
    		<td>
                {{$categoria->id}}
             </td>
            <td>
                {{$categoria->nome}}
            </td>
            <td>
            <div style="float:right">
                <a class="btn btn-secondary btn-sm" href="{{ route('categorias.edit',['id'=>$categoria->id]) }}" role="button">Editar</a>
                <a class="btn btn-danger btn-sm" href="{{ route('categorias.destroy',['id'=>$categoria->id]) }}"
                onclick="event.preventDefault();
                document.getElementById('desativar-form{{$categoria->id}}').submit();">Desativar</a>
                <form id="desativar-form{{$categoria->id}}" action="{{ route('categorias.destroy',['id'=>$categoria->id]) }}"   method="POST" style="display: none;">
                {{ csrf_field()}}
                {{method_field("DELETE")}}
                </form>
            </div>
                </td>
    		</tr>
            @endforeach
    </tbody>
</table>
</div>

@endsection
