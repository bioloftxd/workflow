@extends('layouts.master')

@section('content')
	@if($mensagem == "1")
		<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Mensagem</th>
					<th>Processo</th>
					<th>Etapa</th>
					<th>Usuário</th>
					<th>Visualização</th>
				</tr>
			</thead>
			<tbody>
				@if($mensagens != NULL)
					@foreach ($mensagens as $mensagem)
						<tr>
							<td>{{$mensagem->mensagem}}</td>
							<td>
								<?php
									$nomeProcesso = App\Processo::where("id", $processo->id)->select('nome')->first();
									
								?>
								{{$nomeProcesso->nome}}
							</td>
							<td>
								<?php
									$nomeEtapa = App\Etapa::where("id", $mensagem->etapa_id)->select('nome')->first();
								?>
								{{$nomeEtapa->nome}}
							</td>
							<td>
								<?php
									$nomeUser = App\User::where("id", $mensagem->user_id)->select('name')->first();
								?>
								{{$nomeUser->name}}
							</td>
							<td>
								@if($mensagem->status_admin == "false")
									
									<form method="post" action="{{ route('mensagem.update', $mensagem->id) }}"">
										{!! method_field('PUT') !!}
										{{ csrf_field() }}

										<button class="btn btn-danger btn-sm " >Não Visualizada</button>
									</form>

									
								@else
									<button class="btn btn-success btn-sm">Visualizada</button>
								@endif
								
								<button class="btn btn-primary btn-sm">Responder</button>

							</td>
						</tr>
					@endforeach
				@else
					<h1>Não existe mensagens!</h1>
				@endif
			</tbody>
		</table>
	@else
		<h2 class="container" style="text-align: center; margin-top: 100px;">Não possui mensagens!</h2>
	@endif
		</div>

	<script type="text/javascript">
		function visualizar(id){
			
			window.location='/mensagem/'+id+'/update';
		};
	</script>

@endsection