@extends('layouts.master')
@section('title')
    Editar anexos
@endsection
@section('content')
    <form method="POST" action="{{route('anexos.update',["id"=>$id])}}" enctype="multipart/form-data">
        {{method_field("PUT")}}
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <legend>Adicionar documentos modelo</legend>
                    <fieldset>
                        <label class="custom-file">
                            <input type="file" id="anexo" name="anexo" class="custom-file-input">
                            <span class="custom-file-control"></span>
                        </label>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>
@endsection