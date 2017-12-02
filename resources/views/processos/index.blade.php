@extends('layouts.master')

@section('content')
    @foreach ($processos as $processo)    
    <div id="accordion" role="tablist">
        <div class="card">
            <div class="card-header" role="tab" id="id-{{$processo->id}}">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#{{$processo->id}}" aria-expanded="false" aria-controls="{{$processo->id}}">
                        {{$processo->nome}}
                    </a>
                </h5>
            </div>
           
            <div id="{{$processo->id}}" class="collapse" role="tabpanel" aria-labelledby="id-{{$processo->id}}"
                 data-parent="#accordion">
                <div class="card-body">
                    merda
                </div>
            </div>
            
        </div>
    </div>
    @endforeach

@endsection  

