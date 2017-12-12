@extends('layouts.app')

@section('content')

		<div id="main" class="container">

			<form method="post" action="{{ route('categoria.store') }}" role="form" autocomplete="off">
				{{ csrf_field() }}
				
				<div class="row form-group">
					<div class="col-sm-12">
						<div class="col-sm-12">
							<h1>Cadastro de Categoria</h1>
						</div>
					</div>
				</div>
				<hr>

				<div class="col-sm-12 form-group">
					<div class="col-sm-12 form-group">
						<label for="nome">Nome da Categoria:</label>
						<input type="text" class="form-control" id="nome" name="nome" maxlength="100" required>
					</div>
				</div>

				<div class="col-sm-12">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</div>
				</div>
			</form>
		</div>
		<br>
		<br>
		<div class="main-table container">
			<div class="col-sm-12">
				<div class="col-sm-12">
					<h2>Lista de Categorias</h2>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Opção</th>
							</tr>
						</thead>
							@foreach ($categorias as $categoria)
								<tr>
									<td>{{$categoria->nome}}</td>
									<td>
						                <button class="btn btn-danger">
						                  	<a href="/categoria/{{$categoria->id}}/destroy">
						                  		Excluir
						                   	</a>
						                </button>
						            </td>
								</tr>
							@endforeach
					</table>
				</div>
			</div>
		</div>

		<style type="text/css">
		#main{
			width: 90%;
			background: white;
			border-radius: 5px;
		}
		#main h1{
			text-align: center;
		}
		#main label{
			font-size: 1.6em;
		}
		#main button{
			font-size: 1.6em;
			float: right;
			margin-bottom: 15px;
		}
		#main textarea{
			width: 100%;
			resize: none;
		}
		.main-table{
			width: 90%;
			background: white;
			padding: 15px 0px 0px 0px;
			border-radius: 5px;
		}
		.main-table button a{
			color: white;
		}
	</style>

@endsection