@extends('layouts.master')

@section('content')

    @push('links')
        <link rel="stylesheet" href="/css/startprocess.css">
    @endpush

    <form id="formulario">
        <ul id="progress">
            @foreach ($etapas as $etapa)
                @if($etapa->id === 1)
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
                                    de verificação pelo administrador do pocesso!</b></p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary prev acao" name="prev">Anterior</button>
                    @if($posicao+1 == sizeof($etapas))
                        <a class="btn btn-secondary" role="button"
                           href="{{route('finish',['id'=>session()->get("id_processo")])}}">Finalizar</a>
                    @else
                        <button type="submit" class="btn btn-success next acao" name="next">Próximo</button>
                    @endif
                </fieldset>
            @endif
        @endforeach
    </form>

    @include('layouts.footer')
@endsection
