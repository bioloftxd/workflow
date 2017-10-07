@extends('layouts.master')

@section('content')


<form>
  <div class="form-row">
   <div class="form-group col-lg-8">
     <label for="nome" class="col-form-label">Nome</label> 
      <input type="text" class="form-control" id="nome" placeholder="Nome processo" required>
    </div>
  <div class="col-lg-4"><label for="nome" class="col-form-label" required>Categoria</label> 
    <div class="input-group">
    
       <select id="categorias" class="form-control">
        <option value="" >Selecione uma categoria</option>
        <option value=""></option>
      </select>
      <span class="input-group-btn">
      
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>
                 
      
      </span>
    </div>
  </div>
</div>
 <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" rows="3" required></textarea>
  </div>
   <div class="form-group">
    <label for="observação">Observação</label>
    <textarea class="form-control" id="descricao" rows="3" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">add Etapa</button>

</form>



  @include('categorias.create')



@endsection 
