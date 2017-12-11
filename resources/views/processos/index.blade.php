@extends('layouts.master')
@section('title')
Processos Cadastrados
@endsection
@push('links')
    <link rel="stylesheet" href="/css/index.css">
@endpush

@section('content')
<div class="container">
<h3><i class="fa fa-folder-o" aria-hidden="true"></i> Modelos de Processos </h3>
    @foreach ($processos as $processo)
    <div id="accordion" role="tablist">
        <div class="card">
            <div class="card-header" role="tab" id="id-{{$processo->id}}">
                <div class="row">
                <div class=" col-lg-10">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#{{$processo->id}}" aria-expanded="false" aria-controls="{{$processo->id}}">
                        {{$processo->nome}}
                    </a>
                </h5>
            </div>
            <div class=" col-lg-2">
                Etapas <span class="badge badge-secondary">{{sizeof($processo->etapa)}}</span>
                @if($processo->usuario_id === Auth::id())
                <i class="fa fa-user-o cor_i" aria-hidden="true"></i>
                @endif
            </div>
            </div>
            </div>

            <div id="{{$processo->id}}" class="collapse" role="tabpanel" aria-labelledby="id-{{$processo->id}}"
                 data-parent="#accordion">
                <div class="card-body">
                    <div class="row justify-content-md-center">
                        @if($processo->usuario_id === Auth::id())
                         <div class="col col-lg-9">
                        @else
                        <div class="col col-lg-10">
                        @endif

                           <p><b>Descrição: </b>{{$processo->descricao}}</p>
                            <p><b>Observação: </b>{{$processo->observacao}}</p>
                         </div>
                         @if($processo->usuario_id === Auth::id())
                         <div class="col col-lg-3">
                            <a class="btn btn-warning btn-sm" role="button" href="{{route('processos.edit',['id'=>$processo->id])}}">Editar</a>

                            <a class="btn btn-danger btn-sm" href="{{ route('processos.destroy',['id'=>$processo->id]) }}" role="button">Excluir</a>

                            <a class="btn btn-success btn-sm" href="{{ route('inicio',['id'=>$processo->id]) }}" role="button">Executar</a>
                         </div>
                         @else
                         <div class="col col-lg-2">

                            <a class="btn btn-success btn-sm" href="{{ route('processos.edit',['id'=>$processo->id]) }}" role="button">Executar</a>
                         </div>
                         @endif
                     </div>
                     <ul>
                    <h5>Etapas do Processo</h5>

                     @foreach ($processo->etapa as $etapa)
                         <li>
                             {{$etapa->nome}}
                         </li>
                     @endforeach
                     </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <h3><i class="fa fa-folder-open-o" aria-hidden="true"></i> Processos em Aberto  </h3>
    @foreach($processos_abertos as $processoa)

    <div id="accordion" role="tablist">
        <div class="card">
            <div class="card-header" role="tab" id="id-{{$processoa->id}}">
                <div class="row">
                    <div class=" col-lg-11">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#{{$processoa->id}}" aria-expanded="false" aria-controls="{{$processoa->id}}">
                                {{$processoa->nome}}
                            </a>

                        </h5>
                    </div>
                </div>
            </div>

            <div id="{{$processoa->id}}" class="collapse" role="tabpanel" aria-labelledby="id-{{$processoa->id}}"
                 data-parent="#accordion">
                <div class="card-body">
                    <div class="row justify-content-md-center">
                         <div class="col col-lg-10">
                           <p><b>Inicio: </b>{{$processoa->data_inicio}}</p>
                            <p><b>Finalizado: </b>{{$processoa->data_final}}</p>
                         </div>
                         <div class="col col-lg-1">
                            <a class="btn btn-secondary" role="button" href="#">Ver</a>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <h3><i class="fa fa-check-square-o" aria-hidden="true"></i>
 Processos Finalizados</h3>
    @foreach ($processos_finalizados as $processof)
    @if($processof === NULL)
        <h2>Processos Finalizados</h2>
        <br>
        <hr>
    @endif

    <div id="accordion" role="tablist">
        <div class="card">
            <div class="card-header" role="tab" id="id-{{$processof->id}}">
                <div class="row">
                    <div class=" col-lg-11">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#{{$processof->id}}" aria-expanded="false" aria-controls="{{$processof->id}}">
                                {{$processof->nome}}
                            </a>

                        </h5>
                    </div>
                </div>
            </div>

            <div id="{{$processof->id}}" class="collapse" role="tabpanel" aria-labelledby="id-{{$processof->id}}"
                 data-parent="#accordion">
                <div class="card-body">
                    <div class="row justify-content-md-center">
                         <div class="col col-lg-10">
                           <p><b>Inicio: </b>{{$processof->data_inicio}}</p>
                            <p><b>Finalizado: </b>{{$processof->data_final}}</p>
                         </div>
                         <div class="col col-lg-1">
                            <a class="btn btn-secondary" role="button" href="#">Ver</a>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
