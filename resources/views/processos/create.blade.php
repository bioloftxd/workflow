@extends('layouts.master')

@section('content')

    <form method="POST" action="{{route('processos.store')}}">
        {{ csrf_field() }}
        <input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
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
                @isset ($processo) value="{{$processo->nome}}" @endisset>
                    
                
            </div>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required="" >@isset ($processo){{$processo->descricao}}@endisset</textarea>
        </div>
        <div class="form-group">
            <label for="observação">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3">@isset ($processo){{$processo->observacao}}@endisset</textarea>
        </div>

        <button type="submit" class="btn btn-primary">add Etapa</button>

    </form>

@endsection