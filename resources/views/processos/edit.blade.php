@extends('layouts.master')

@section('content')

    <form method="POST" action="{{route('processos.update',["id"=>$processo->id])}}">
        {{ csrf_field() }}
        {{method_field("PUT")}}
        <div class="form-row">
            <div class="col-lg-4">
                <label for="categoria" class="col-form-label">Categoria</label>
                <div class="input-group">
                    <select id="categoria" name="categoria" class="form-control" required="">
                        <option value="null" disabled="" selected>Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}"
                                    @if($processo->categoria_id == $categoria->id) selected @endif>{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-lg-8">
                <label for="nome" class="col-form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome processo" required=""
                       value="{{$processo->nome}}">
            </div>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"
                      required="">{{$processo->descricao}}</textarea>
        </div>
        <div class="form-group">
            <label for="observação">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3"
                      required="">{{$processo->observacao}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">add Etapa</button>

    </form>

@endsection