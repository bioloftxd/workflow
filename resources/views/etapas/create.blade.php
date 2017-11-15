@extends('layouts.master')

@section('content')

<form>
  <input type="hidden"name="_token" value="{{csrf_token()}}">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="nome" class="col-form-label">Nome</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome etapa">
    </div>
  </div>
 <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" rows="3"></textarea>
  </div>
   <div class="form-group">
    <label for="observação">Observação</label>
    <textarea class="form-control" id="descricao" rows="3"></textarea>
  </div>
  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox"> Requer Verificação
      </label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <button type="submit" class="btn btn-primary">Nova etapa</button>
    </div>
    <div class="col-md-4" >
       <button type="submit" class="btn btn-primary" style="float: right">Finalizar Processo</button>
    </div> 
  </div>
  <fieldset>
    <legend>Adicionar documentos modelo</legend>
    <div class="form-group">
    <input type="file" class="form-control-file" id="file" multiple>
  </div>
  </fieldset>
</form>
@endsection