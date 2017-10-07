@extends('layouts.master')

@section('content')

    <form action="/">
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
        <button type="submit" class="btn btn-primary">add Etapa</button>
    </form>




@endsection