@extends('layouts.master')
@section('title')
Editar Processo {{$processo->nome}}
@endsection
@push('links')
    <link rel="stylesheet" href="/css/categorias.css">
@endpush

@section('content')

<div class="container">
    <form method="POST" id="alterar-form"action="{{route('processos.update',["id"=>$processo->id])}}">
        {{ csrf_field() }}
        {{method_field("PUT")}}
        <div class="form-row">
            <div class="col-lg-4">
                <label for="categoria" class="col-form-label">Categoria</label>
                <div class="input-group">
                    <select id="categoria" name="categorias_id" class="form-control" required="">
                        <option value="null" disabled="" selected>Selecione uma categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}"
                                    @isset ($processo)
                                        @if($processo->categorias_id==$categoria->id)
                                        selected=""
                                        @endif
                                    @endisset>
                                {{$categoria->nome}}
                            </option>
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
                      >{{$processo->observacao}}</textarea>
        </div>

    </form>

    <a class="btn btn-primary" href="{{route('processos.update',["id"=>$processo->id])}}"
                onclick="event.preventDefault();
                document.getElementById('alterar-form').submit();">Alterar</a>

    <a class="btn btn-danger" href="{{ route('processos.destroy',['id'=>$processo->id]) }}"
                onclick="event.preventDefault();
                document.getElementById('desativar-form').submit();">Desativar</a>
    <form id="desativar-form" action="{{ route('processos.destroy',['id'=>$processo->id]) }}"   method="POST" style="display: none;">
    {{ csrf_field() }}
    {{method_field("DELETE")}}
    </form>
    <a class="btn btn-success" href="{{ route('etapas.create') }}" role="button">Adicionar Etapa</a>
    <center><h3>Etapas</h3></center>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome Etapa</th>
                <th style="text-align: right">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($processo->etapa as $etapa)
            @if(!$etapa->desativado)
            <tr>
                <td>
                    {{$etapa->nome}}
                </td>
                <td>
                    <div style="float:right">
                        <a class="btn btn-secondary btn-sm" href="{{ route('etapas.edit',['id'=>$etapa->id]) }}" role="button">Editar</a>

                        <a class="btn btn-danger btn-sm" href="{{ route('etapas.destroy',['id'=>$etapa->id]) }}"onclick="event.preventDefault();
                         document.getElementById('desativar-form{{$etapa->id}}').submit();">Desativar</a>
                        <form id="desativar-form{{$etapa->id}}" action="{{ route('etapas.destroy',['id'=>$etapa->id]) }}"   method="POST" style="display: none;">
                        {{ csrf_field()}}
                        {{method_field("DELETE")}}
                        </form>
                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
  </div>

@endsection
