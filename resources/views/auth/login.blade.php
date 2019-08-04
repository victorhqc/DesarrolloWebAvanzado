@extends('layouts.app')

@section('title', 'Inicia sesión')

@section('app-styles')
    <style type="text/css">
      .main-login {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
      }
      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        border: 1px solid #ccc;
      }
      .form-sugnin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-right-radius: 0;
        border-top-left-radius: 0;
      }
    </style>
@endsection

@section('content')
    <div class="main-login text-center">
      <form class="form-signin" action="{{ action('Auth\LoginController@login') }}" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Inicia sesión</h1>
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger" role="alety">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label class="sr-only" for="input_email">Correo electrónico</label>
        <input
          id="input_email"
          name="email"
          class="form-control"
          type="email"
          placeholder="Correo electrónico"
          required=""
          autofocus=""
          />
        <label class="sr-only" for="input_password">Contraseña</label>
        <input
          id="input_password"
          name="password"
          class="form-control"
          type="password"
          placeholder="Contraseña"
          required=""
        />
        <button class="btn btn-lg btn-primary btn-lock" type="submit">
          Iniciar sesión
        </button>
        <p class="mt-5 mb-3">
          <a href="<?php echo url("/signup") ?>">Registrarse</a>
        </p>
      </form>
  </div>
@endsection
