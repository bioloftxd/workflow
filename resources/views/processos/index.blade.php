@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-10">
		<h1>Lista de Processos Cadastrados</h1>	
	</div>
	<div class="col-lg-2">
		<button type="submit" class="btn btn-primary">add Processos</button>
	</div>
	
</div>

<div class="col-lg-12">

	<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Desativado</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <!--  -->
      <td></td>
      
    </tr>
  </tbody>
</table>

</div>
@endsection      