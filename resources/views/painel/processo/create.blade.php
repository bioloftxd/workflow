@extends('layouts.app')

@section('content')
	<div id="main" class="container">
		<form method="post" action="{{ route('processo.store') }}" role="form" autocomplete="off">
			{{ csrf_field() }}
		
			<div class="row form-group">
				<div class="col-sm-12">
					<div class="col-sm-12">
						<h1>Cadastro de Processo</h1>
					</div>
				</div>
			</div>
			<hr>
			<div class="col-sm-12 form-group">
				<div class="col-sm-12 form-group">
					<label for="nome">Nome:</label>
					<input type="text" class="form-control" id="nome" name="nome" maxlength="100" required>
				</div>
			</div>

			<div class="col-sm-12 form-group">
				<div class="col-sm-12 form-group">
					<label for="descricao">Descrição:</label>
					<br>
					<textarea name="descricao" id="descricao" rows="5" required></textarea>
				</div>
			</div>

			<div class="col-sm-12 form-group">
				<div class="col-sm-12 form-group">
					<label for="observacao">Observação:</label>
					<br>
					<textarea name="observacao" id="observacao" rows="5" required></textarea>
				</div>
			</div>

			<div class="col-sm-12 form-group">
				<div class="col-sm-12 form-group">
					<label>Categoria: </label>
					<select class="form-control" name="categoria" required>
						<option value="" hidden selected>Selecione</option>
						@foreach ($categorias as $categoria)
					 		<option value="{{$categoria->id}}">{{$categoria->nome}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-sm-12 form-group">
				<div class="col-sm-12 form-group">
					<button type="submit" class="btn btn-primary">Vincular Etapa</button>
				</div>
			</div>
		</form>
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
		}
		#main textarea{
			width: 100%;
			resize: none;
		}
	</style>

@endsection		