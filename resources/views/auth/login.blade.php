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
      <form class="form-signin" action="#" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Inicia sesión</h1>
        <label class="sr-only" for="inputEmail">Correo electrónico</label>
        <input
          id="inputEmail"
          name="username"
          class="form-control"
          type="email"
          placeholder="Correo electrónico"
          required=""
          autofocus=""
          />
        <label class="sr-only" for="inputPassword">Contraseña</label>
        <input
          id="inputPassword"
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