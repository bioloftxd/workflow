@extends('layouts.master')

@section('content')

@push('links')
    <link rel="stylesheet" href="/css/reset.css">
@endpush


<div class="verde">
    <div class="container-fluid">
        <h3>Resetar Senha</h3>
        <div class="jumbotron">

        <div class="col-md-12 col-md-offset-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digitar e-mail" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                                <button type="submit" class="btn btn-login">
                                    Receber Link para Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
