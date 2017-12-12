@extends('layouts.app')

@section('content')

	<div id="main" class="container">
	    <div class="col-sm-12">
			<div class="col-sm-12">	    	
				<form method="post" action="{{ route('etapa.store') }}" role="form" autocomplete="off">
					
					{{ csrf_field() }}
				
					<div class="row form-group">
						<div class="col-sm-12">
							<div class="col-sm-12">
								<h1>Cadastro de Etapa</h1>
							</div>
						</div>
					</div>
					<hr>

					<div class="col-sm-12 form-group">
						<div class="col-sm-3">
							<label>Codigo Processo: </label>
							<input type="text" class="form-control" disabled value="{{$processo}}">
							<input type="hidden" name="processo_id" value="{{$processo}}">
						</div>
						<div class="col-sm-9">
							<label for="nome">Nome: </label>
							<input type="text" class="form-control" id="nome" name="nome" maxlength="100" required>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="col-sm-12">
							<label for="descricao">Descrição: </label>
							<textarea name="descricao" class="form-control" rows="5"></textarea>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="col-sm-12">
							<label for="observacao">Descrição: </label>
							<textarea name="observacao" class="form-control" rows="5"></textarea>
						</div>
					</div>

					<div class="col-sm-12 form-group">
						<div class="col-sm-12">
							<label>Anexo: </label>
							<textarea name="anexo" class="form-control" rows="1"></textarea>
						</div>
					</div>
					
					<div class="col-sm-12 form-group">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-success finalizar">Finalizar Processo</button>
							<button type="submit" class="btn btn-primary" style="margin-right: 10px;">Salvar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
	<div id="main-table" class="container">
		<div class="col-sm-12">
			<div class="col-sm-12">
				<div class="row form-group">
					<div class="col-sm-12">
						<div class="col-sm-12">
							<h1>Listar Etapa</h1>
						</div>
					</div>
				</div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Descrição</th>
							<th>Observção</th>
							<th>Opção</th>
						</tr>
					</thead>
						@if(isset($etapas))
							@foreach ($etapas as $etapa)
								<tr>
									<td>{{$etapa->nome}}</td>
									<td>{{$etapa->descricao}}</td>
									<td>{{$etapa->observacao}}</td>
									<td>
					                    <button class="btn btn-danger">
					                    	<a href="/etapa/{{$etapa->processo_id}}/{{$etapa->id}}/destroy">
					                    		Excluir
					                    	</a>
					                    </button>
					                    
					                </td>
								</tr>
							@endforeach
						@else
							<h1>Não tem Etapas cadastradas!</h1>
						@endif
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".finalizar").click(function(e) {
         		e.preventDefault();
         		alert("Processo registrado com sucesso!");
         		window.location='/processo';
      		});
		});
	</script>
	
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
		#main button a{
			color: white;
		}
		#main textarea{
			width: 100%;
			resize: none;
		}
		#main-table{
			width: 90%;
			background: white;
			border-radius: 5px;
		}
		#main-table button a{
			color: white;
		}
	</style>
@endsection