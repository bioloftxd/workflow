   @extends('layouts.master')

    
    @section('content')
    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>id</th>
    			<th>Nome Categoria</th>
    			<th>Desativado(S/N)</th>
    			<th>Editar</th>
    			<th>Deletar</th>
    		</tr>
    	</thead>
    	<tbody>
    		{{--@foreach ($categorias as $categoria)--}}
    		<tr>   			
    			<th scope="row">
					<td>Dados</td>
					<td>Dados</td>
					<td>Dados</td>
					<td>Edit</td>
					<td>Deletar</td>
    			</th>   			
    		</tr>
{{--@endforeach--}}
    		
    	</tbody>
    </table>
    @endsection
