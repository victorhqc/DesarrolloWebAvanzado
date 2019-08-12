@extends('layouts.app')

@section('title', 'Productos')

@section('topbar')
    @component('layouts.navigation', [
        'login_text' => $email ? 'Cerrar sesión' : 'Iniciar sesión',
        'login_url' => $email ? url("/logout") : url("/login"),
        'email_img' => $email_img,
        'email' => $email,
        'name' => $name,
        'route_paths' => $route_paths
    ])
    @endcomponent
@endsection

@section('content')
    <div class="container">
        <h1 class="mt-sm-3 mb-sm-5">Tipo o Marca</h1>
        <form
            method="post"
            action="{{ action('BrandAndProductTypeController@submitProductType') }}">
            @csrf
            <div class="form-group row">
                <label
                    for="type"
                    class="col-sm-3 col-form-label">
                    Seleccione una opción
                </label>
                <div class="col-sm-5">
                    <select
                        name="type"
                        id="type"
                        class="form-control"
                        required>
                        <option></option>
                        <option value="product_type">Tipo de producto</option>
                        <option value="brand">Marca</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label
                    for="name"
                    class="col-sm-3 col-form-label">
                    Nombre
                </label>
                <div class="col-sm-5">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        required
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <button
                      type="submit"
                      class="btn btn-success pull-right">
                      <i class="fa fa-plus-square" aria-hidden="true"></i>
                      Agregar
                  </button>
                </div>
            </div>
        </form>
    </div>
@endsection
