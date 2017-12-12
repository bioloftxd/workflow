@extends('layouts.master')

@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nome Etapa</th>
            <th style="text-align: right">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($etapas as $etapa)
                <tr>
                    <td>
                        {{$etapa->nome}}
                    </td>
                    <td>
                        <div style="float:right">
                                <a class="btn btn-primary btn-sm" href="/mensagem/{{$ids}}/{{$etapa->id}}"
                                   role="button">Mensagem</a>
                        </div>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection