@extends('layouts.master')

@section('content')

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
    <center><h3>Etapas do processo {{$processo->nome}}</h3></center>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome Etapa</th>
                <th style="text-align: right">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($processo->etapa as $etapa)
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
            @endforeach
        </tbody>
    </table>
    

@endsection