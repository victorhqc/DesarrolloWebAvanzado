@extends('layouts.app')

@section('title', 'Productos')

@section('topbar')
    @component('layouts.navigation', [
        'login_text' => $email ? 'Cerrar sesión' : 'Iniciar sesión',
        'login_url' => $email ? url("/logout") : url("/login"),
        'email_img' => $email_img,
        'email' => $email,
        'route_paths' => $route_paths
    ])
    @endcomponent
@endsection

@section('content')
    <div class="container">
        <h1 class="mt-sm-3 mb-sm-5">Agregar Producto</h1>
        <form
            method="post"
            action="{{ action('ProductsController@submitProduct') }}"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group row">
                <label
                    for="product_name"
                    class="col-sm-2 col-form-label">
                    Nombre
                </label>
                <div class="col-sm-6">
                    <input
                        type="text"
                        name="product_name"
                        class="form-control"
                        id="product_name"
                        required
                    />
                </div>
            </div>
            <div class="form-group row">
                <label
                    for="product_description"
                    class="col-sm-2 col-form-label">
                    Descripción
                </label>
                <div class="col-sm-6">
                    <input
                        type="text"
                        name="product_description"
                        id="product_description"
                        class="form-control"
                        required
                    />
                </div>
            </div>
            <div class="form-group row">
                <label
                    for="product_type"
                    class="col-sm-2 col-form-label">
                    Tipo de producto
                </label>
                <div class="col-sm-6">
                    <select
                        name="product_type"
                        id="product_type"
                        class="form-control"
                        required>
                        <option value="">Seleccione una opción</option>
                        @foreach($productsTypes as $type)
                            <option value="{{$type['id']}}">
                                {{$type['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label
                    for="product_brand"
                    class="col-sm-2 col-form-label">
                    Marca
                </label>
                <div class="col-sm-6">
                    <select
                        name="product_brand"
                        id="product_brand"
                        class="form-control"
                        required>
                        <option value="">Seleccione una opción</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand['id']}}">
                                {{$brand['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label
                    for="upload_file"
                    class="col-sm-2 col-form-label">
                    Subir imagen
                </label>
                <div class="col-sm-6">
                    <input
                        type="file"
                        class="upload_file"
                        name="upload_file"
                        id="upload_file"
                        required
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-success pull-right">
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                        Crear producto
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
