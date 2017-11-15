        @extends('layouts.master')

        @section('content')

        <form method="POST"action="{{action('EtapasController@create')}}">
            <input type="hidden"name="_token" value="{{csrf_token()}}">
            <div class="form-row">
                 <div class="col-lg-4">
                    <label for="categoria" class="col-form-label">Categoria</label>
                    <div class="input-group">
                        <select id="categoria" name="categoria" class="form-control" required="">
                            <option value="">--Selecione uma categoria--</option>
                            <option value=""></option>
                        </select>
                        <span class="input-group-btn">      
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categorias" data-whatever="@mdo">+</button>
                        </span>
                    </div>
                </div>
                <div class="form-group col-lg-8">
                    <label for="nome" class="col-form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome processo" required="">
                </div>
               
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required=""></textarea>
            </div>
            <div class="form-group">
                <label for="observação">Observação</label>
                <textarea class="form-control" id="observacao" name="observacao" rows="3" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary">add Etapa</button>

        </form>
        @include('categorias.create')
        @endsection

