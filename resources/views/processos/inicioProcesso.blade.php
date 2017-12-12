@extends('layouts.master')

@section('content')

    @push('links')
        <link rel="stylesheet" href="/css/startprocess.css">
    @endpush

    <form id="formulario">
        <ul id="progress">
            @foreach ($etapas as $etapa)
                @if($etapa->id == 1)
                    <li class="ativo">{{$etapa->id}}</li>
                @endif
                @if($etapa->id !=1)
                    <li>{{$etapa->id}}</li>
                @endif
            @endforeach
        </ul>
        @foreach ($etapas as $posicao=>$etapa)
            @if($posicao == 0)
                <fieldset>
                    <div class="jumbotron">
                        <h1 class="display-3"><b>Etapa:</b> {{$etapa->nome}}</h1>
                        <hr>
                        <p class="lead"><b>Descrição:</b> {{$etapa->descricao}}</p>
                        <p class="lead"><b>Observação:</b> {{$etapa->observacao}}</p>
                        @if($etapa->verificacao == 1)
                            <p class="lead"><i class="fa fa-dot-circle-o icor" aria-hidden="true"></i><b>Etapa precisa
                                    de verificação pelo administrador do processo!</b></p>
                        @endif
                        @if(sizeof($etapa->anexo)>1)
                            @foreach($etapa->anexo as $anexo)
                                <a href="{{route("download",["path"=>str_replace("modelos/","", $anexo->caminho), "nome"=>$anexo->nome])}}">{{$anexo->nome}}</a>
                            @endforeach
                        @else
                            @php
                                $etapa = $etapa->anexo[0];
                            @endphp
                            <a href="{{route("download",["path"=>str_replace("modelos/","", $etapa->caminho), "nome"=>$etapa->nome])}}">{{$etapa->nome}}</a>
                        @endif
                    </div>

                    @if($posicao+1 == sizeof($etapas))
                        <a class="btn btn-secondary" role="button"
                           href="{{route('finish',['id'=>session()->get("id_processo")])}}">Finalizar</a>
                    @else
                        <button type="submit" class="btn btn-success next acao" name="next">Próximo</button>
                </fieldset>
            @endif
            @endif
            @if($posicao != 0)
                <fieldset>
                    <div class="jumbotron">
                        <h1 class="display-3"><b>Etapa:</b> {{$etapa->nome}}</h1>
                        <hr>
                        <p class="lead"><b>Descrição:</b> {{$etapa->descricao}}</p>
                        <p class="lead"><b>Observação:</b> {{$etapa->observacao}}</p>
                        @if($etapa->verificacao == 1)
                            <p class="lead"><i class="fa fa-dot-circle-o icor" aria-hidden="true"></i><b>Etapa precisa
                                    de verificação pelo administrador do processo!</b></p>
                        @endif
                    </div>
                    @if($posicao+1 == sizeof($etapas))
                        <a class="btn btn-secondary" role="button"
                           href="{{route('finish',['id'=>$etapa->processos_id])}}">Finalizar</a>
                    @else
                        <button type="submit" class="btn btn-success next acao" name="next">Próximo</button>
                    @endif
                    <button type="submit" class="btn btn-primary prev acao" name="prev">Anterior</button>

                </fieldset>
            @endif
        @endforeach
    </form>
    @include('layouts.footer')
@endsection
