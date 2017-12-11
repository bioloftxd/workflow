@extends('layouts.master')

@section("title","Registrar")

@section('content')

@push('links')
    <link rel="stylesheet" href="/css/register.css">
@endpush

<div class="verde">
    <div class="container-fluid">
        <h3>Efetuar Regitro</h3>
        <div class="jumbotron">
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                            <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required>
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

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Digite uma senha" required>
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

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirme a senha" class="form-control"
                           required>
                       </div>
                   </div>
               </div>
               <div class="row justify-content-center">
                   <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                       <button type="submit" class="btn btn-login">
                           Registrar
                       </button>
                   </div>
               </div>
               <div class="row justify-content-center">
                   <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                       <button type="cancel" class="btn btn-cancel">
                           Cancelar
                       </button>
                   </div>
               </div>
           </form>
       </div>
   </div>
</div>

@endsection
