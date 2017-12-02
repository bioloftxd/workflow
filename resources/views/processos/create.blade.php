@extends('layouts.master')

@section('content')

    <form>
        {{csrf_field()}}
        <div class="form-row">
            <div class="form-group col-lg-8">
                <label for="nome" class="col-form-label">Nome</label>
                <input type="text" class="form-control" id="nome" placeholder="Nome processo">
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
        </div>
    </form>
    @include('categorias.create')
@endsection

