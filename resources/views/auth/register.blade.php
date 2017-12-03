@extends('layouts.master')

@section("title","Registrar")

@section('content')

    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control"
                           placeholder="Nome" required autofocus>
                </div>
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control"
                           placeholder="seuNome@exemplo.com" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                    <label for="password-confirm">Confirmar Senha</label>
                    <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirme a senha" class="form-control"
                           required>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </div>
        </div>
    </form>
@endsection
