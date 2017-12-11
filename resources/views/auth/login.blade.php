
@extends('layouts.master')

@section("title","Login")

@section('content')

@push('links')
    <link rel="stylesheet" href="/css/login.css">
@endpush


<div class="verde">
<div class="container-fluid">
<i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
<h3>Olá! Digite o seu e-mail e senha</h3>
  <div class="jumbotron">
    <form method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <div class="row justify-content-center">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">

              <input type="email" name="email" class="form-control" id="email"
                     placeholder="Entre com seu e-mail" required
                     autofocus>
          </div>
      </div><br>
      <div class="row justify-content-center">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">

              <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
          </div>
      </div>

      <div class="row justify-content-center">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <div class="checkbox">
                  <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-me
                  </label>
              </div>
          </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <button type="submit" class="btn btn-login">
            Acessar
          </button><br>
        </div>
      </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <a class="nav-link" href="{{ route('register') }}">Criar Conta<span class="sr-only">(current)</span></a>
              <a class="nav-link" href="{{ route('password.request') }}">
            Esqueceu a senha?
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

</div>
@endsection
