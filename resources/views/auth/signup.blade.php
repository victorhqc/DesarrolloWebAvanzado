@extends('layouts.app')

@section('title', 'Registro')

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

    </style>
@endsection

@section('topbar')
@endsection

@section('content')
    <div class="main-login text-center">
        <form
            class="form-signin"
            action="{{ action('Auth\SignupController@signup') }}"
            method="post"
        >
            <h1 class="h3 mb-3 font-weight-normal">Regístrate</h1>
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
            <div class="text-left">
                <div class="form-group">
                    <label for="input_email">Correo electrónico</label>
                    <input
                        id="input_email"
                        name="email"
                        class="form-control"
                        type="email"
                        placeholder="Correo electrónico"
                        required=""
                        autofocus=""
                    />
                </div>
                <div class="form-group">
                    <label for="input_name">Nombre</label>
                    <input
                        id="input_name"
                        name="name"
                        class="form-control"
                        type="text"
                        placeholder="Nombre"
                        required=""
                     />
                </div>
                <div class="form-group">
                    <label for="input_last_name">Apellido</label>
                    <input
                        id="input_last_name"
                        name="last_name"
                        class="form-control"
                        type="text"
                        placeholder="Apellido"
                        required=""
                    />
                </div>
                <div class="form-group">
                    <label for="input_password">Contraseña</label>
                    <input
                        id="input_password"
                        name="password"
                        class="form-control"
                        type="password"
                        placeholder="Contraseña"
                        required=""
                    />
                </div>
                <div class="form-group">
                    <label for="input_password_confirmation">Repite la contraseña</label>
                    <input
                        id="input_password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        type="password"
                        placeholder="Repite la Contraseña"
                        required=""
                    />
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-lock" type="submit">
                Registrarse
            </button>
            <p class="mt-5 mb-3">
                <a href="{{ url("/login") }}">Inicia sesión</a>
            </p>
      </form>
    </div>
@endsection
