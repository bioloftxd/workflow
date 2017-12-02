@extends('layouts.master')

@section("title","Registrar")

@section('content')

    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" id="email"
                       placeholder="seuNome@exemplo.com" required
                       autofocus>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-me
                    </label>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-7 col-lg-4">
                <button type="submit" class="btn btn-primary">
                    Acessar
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Esqueceu a senha?
                </a>
            </div>
        </div>
    </form>

    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email"
                       value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control"
                       name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>
    </form>
@endsection
