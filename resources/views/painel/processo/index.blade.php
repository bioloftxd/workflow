<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
</head>
<body>
	
	<table id="employee_data" class="table table-bordered table-striped" border="1">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Obervação</th>
					<th>Categoria</th>
				</tr>
			</thead>

			@foreach ($processos as $processo)
			 	
					<tr>
						<td>{{$processo->id}}</td>
						<td>{{$processo->nome}}</td>
						<td>{{$processo->descricao}}</td>
						<td>{{$processo->observacao}}</td>
						<td>{{$processo->categoria}}</td>
					</tr>
				
			@endforeach
	</table>


</body>
</html>