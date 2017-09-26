@extends('layouts.master')

@section('content')


<form>
  <div class="form-row">
   <div class="form-group col-lg-8">
     <label for="nome" class="col-form-label">Nome</label> 
      <input type="text" class="form-control" id="nome" placeholder="Nome processo">
    </div>
  <div class="col-lg-4"><label for="nome" class="col-form-label">Categoria</label> 
    <div class="input-group">
    
       <select id="inputState" class="form-control">
        <option value="" disabled=""></option>
        
      </select>
      <span class="input-group-btn">
      
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div>
 <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" rows="3"></textarea>
  </div>
   <div class="form-group">
    <label for="observação">Observação</label>
    <textarea class="form-control" id="descricao" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">add Etapa</button>

</form>

@endsection    


