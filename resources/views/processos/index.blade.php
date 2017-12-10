@extends('layouts.master')
@section('title')
Processos Cadastrados
@endsection
@section('content')
    @foreach ($processos as $processo)    
    <div id="accordion" role="tablist">
        <div class="card">
            <div class="card-header" role="tab" id="id-{{$processo->id}}">
                <div class="row">
                <div class=" col-lg-11">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#{{$processo->id}}" aria-expanded="false" aria-controls="{{$processo->id}}">
                        {{$processo->nome}}
                    </a>
                 
                </h5>
            </div>
            <div class=" col-lg-1">
                Etapas <span class="badge badge-secondary">
                    @php
                        $contar=0;
                    @endphp
                    @foreach ($processo->etapa as $etapa)
                        @php
                        if($etapa->desativado===0)
                        {
                         $contar++;   
                        }
                        @endphp
                    @endforeach
                {{$contar}}</span>
            </div>
            </div>
            </div>
           
            <div id="{{$processo->id}}" class="collapse" role="tabpanel" aria-labelledby="id-{{$processo->id}}"
                 data-parent="#accordion">
                <div class="card-body">
                    <div class="row justify-content-md-center">
                         <div class="col col-lg-10">
                           <p><b>Descrição: </b>{{$processo->descricao}}</p>
                            <p><b>Observação: </b>{{$processo->observacao}}</p>
                         </div>
                         <div class="col col-lg-1">
                            <a class="btn btn-secondary" role="button" href="">Executar</a>                            
                         </div>
                         <div class="col col-lg-1">
                            <a class="btn btn-secondary" href="{{ route('processos.edit',['id'=>$processo->id]) }}" role="button">Editar</a>
                         </div>
                     </div>
                </div>
				<hr>
        		<ul>
                @foreach ($processo->etapa as $etapa)
                    <li>
                        {{$etapa->nome}}    
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endforeach

@endsection  

