@extends('layouts.master')

@section('content')
    <form method="POST" action="{{route('etapas.update',["id"=>$etapa->id])}}" enctype="multipart/form-data">
        {{method_field("PUT")}}
        {{ csrf_field() }}
        <input type="hidden" name="processos_id" value="{{session()->get('processo')->id}}">
        <input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="nome" class="col-form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome etapa"
                       value="{{$etapa->nome}}">
            </div>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="3">{{$etapa->descricao}}</textarea>
        </div>
        <div class="form-group">
            <label for="observação">Observação</label>
            <textarea class="form-control" name="observacao" id="observacao" rows="3">{{$etapa->observacao}}</textarea>
        </div>
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" name="verificacao" value="1" type="checkbox"
                           @if($etapa->verificacao ==1)checked @endif> Requer Verificação
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{action("EtapasController@finalizar")}}" class="btn btn-danger">Finalizar Processo</a>
            </div>
        </div>
        <fieldset>
            <legend>Adicionar documentos modelo</legend>
            <div class="form-group">
                <input type="file" id="anexo" name="anexo[]" multiple class="form-control-file">
            </div>
        </fieldset>
    </form>
@endsection