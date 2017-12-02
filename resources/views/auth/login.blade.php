@extends('layouts.master')

@section("title","Login")

@section('content')

    <form method="POST" action="{{ route('login') }}">
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
@endsection
