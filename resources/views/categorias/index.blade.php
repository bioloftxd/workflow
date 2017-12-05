   @extends('layouts.master')

    
    @section('content')
 <form method="POST" action="{{route('categorias.store')}}">  
    {{csrf_field()}}
  <div class="form-row">
    <div class="form-group col-md-11">      
      <input type="text" name="nome" class="form-control" required="" placeholder="Criar nova Categoria">
    </div>
    <div class="form-group col-md-1">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
    
  </div>
 
  
</form>


    <table class="table table-striped table-bordered">
    	<thead>
    		<tr>
    			<th>id</th>
    			<th>Nome Categoria</th>
    			<th>Ação</th>
    			
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
                    <a class="btn btn-secondary" href="{{ route('categorias.edit',['id'=>$categoria->id]) }}" role="button">Editar</a>
                   

                    <a class="btn btn-danger" href="{{ route('categorias.destroy',['id'=>$categoria->id]) }}"
                onclick="event.preventDefault();
                document.getElementById('desativar-form{{$categoria->id}}').submit();">Desativar</a>
                <form id="desativar-form{{$categoria->id}}" action="{{ route('categorias.destroy',['id'=>$categoria->id]) }}"   method="POST" style="display: none;">
                {{ csrf_field()}}
                {{method_field("DELETE")}}
                </form>
                </td>
    		</tr>


            @endforeach
    		
    	</tbody>
    </table>
    @endsection
