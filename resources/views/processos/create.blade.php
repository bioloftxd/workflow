@extends('layouts.master')

@section('content')


<form class="container">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" placeholder="First name" value="" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="categoria">Categoria</label>
      <input type="text" class="form-control" id="categoria" placeholder="Categoria" value="" required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-9 mb-3">
      <label for="descricao">Descrição</label>
      <input type="text" class="form-control" id="descricao" placeholder="Descrição" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="desativado">Desativado</label>
      <input type="text" class="form-control" id="desativado" placeholder="Desativado" required>
    </div>
    </div>

    <div class="row">
    <div class="col-md-12 mb-3">
      <label for="observacao">Observação</label>
      <textarea class="form-control" id="observacao" rows="3"></textarea>
    </div>
  </div>
 
  	<button class="btn btn-primary" type="submit">add Etapas</button>  		
  
</form>

@endsection    
