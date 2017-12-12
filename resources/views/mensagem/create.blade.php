@extends('layouts.master')
@section('title')
    Cadastar Mensagem
@endsection
@push('links')
    <link rel="stylesheet" href="/css/categorias.css">
@endpush

@section('content')
    <div class="container">
    <form method="POST" action="{{route('mensagem.store')}}" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <h3>Cadastro de Mensagem do Processo ({{$processo->nome}}) da Etapa ({{$etapa->nome}})</h3>

        <input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="processo_id" value="{{$processo->id}}">
        <input type="hidden" name="etapa_id" value="{{$etapa->id}}">

        <div class="form-group">
            <h5 for="mensagem">Mensagem:</h5>
            <textarea class="form-control" name="mensagem" id="mensagem" cols="5" rows="3"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm">Registrar</button>
        </div>
        
    </form>
    </div>
@endsection