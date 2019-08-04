@extends('layouts.app')

@section('title', 'Inicio')

<!-- TODO: Reutilizar-->
@section('topbar')
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Catálogo</a>
    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" role="navigation">
        <li>Hello World</li>
      </ul>
    </div>
    <div>
      <span class="navbar-text mr-3">
        Test
      </span>
      <span class="navbar-text">
        <a class="btn btn-outline-info" href="<?php echo url("/logout") ?>" role="button">
          Cerrar sesión
        </a>
      </span>
    </div>
  </nav>
@endsection

@section('content')
    <div class="container mt-4">
      <div class="jumbotron">
        <h1 class="display-4">
          Bienvenido al catálogo genérico!
        </h1>
        <p class="lead">
          Hasta aquí la primer entrega de la tarea de Computación en el Servidor Web
        </p>
        <hr class="my-4">
        <p>
          El proyecto contiene:
          <ul>
            <li>Inicio de sesión.</li>
            <li>Registro de usuario.</li>
            <li>Manejo de sesión utilizando un archivo de texto.</li>
            <li>Modelo Vista Controlador.</li>
            <li>Configuraciones de ambiente leyendo un archivo de texto.</li>
          </ul>
        </p>
        <p>
          Como un pequeño bono, decidimos agregar un <b>de forma muy básica</b> lo que sería la
          administración de productos utilzando <i>$_SESSION</i>.
        </p>
        <div class="mt-5">
          <a
            class="btn btn-primary btn-lg"
            href="https://github.com/victorhqc/DesarrolloWebAvanzado"
            target="_blank"
            role="button">
            Ir al repositorio
          </a>
          <a
            class="btn btn-outline-primary btn-lg"
            href="#"
            role="button">
            Descargar documentación
          </a>
        </div>
      </div>
    </div>
@endsection
