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
        <div class="d-flex justify-content-center">
            <form
                method="post"
                action="{{ action('ProductsController@submitProduct') }}"
                enctype="multipart/form-data"
            >
                @csrf
                <h1>Agregar Productos</h1>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Nombre:</strong>
                        <input
                            class="form-control"
                            type="text"
                            name="product_name"
                            required
                        />
                    </li>
                    <li class="list-group-item">
                        <strong>Descripción:</strong>
                        <input
                            class="form-control"
                            type="text"
                            name="product_description"
                            required
                        />
                    </li>
                    <li class="list-group-item">
                        <strong>Tipo de producto:</strong>
                        <select name="product_type" class="form-control" required>
                            <option value="">Seleccione una opción</option>
                            @foreach($productsTypes as $type)
                                <option value="{{$type['id']}}">
                                    {{$type['name']}}
                                </option>
                            @endforeach
                        </select>
                    </li>
                    <li class="list-group-item">
                        <strong>Marca de producto:</strong>
                        <select name="product_brand" class="form-control" required>
                            <option value="">Seleccione una opción</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand['id']}}">
                                    {{$brand['name']}}
                                </option>
                            @endforeach
                        </select>
                    </li>
                    <li class="list-group-item">
                        <strong>Selecciona una imagen:</strong><br>
                        <input
                            type="file"
                            class="upload_file btn btn-warning"
                            name="upload_file"
                            required
                        >
                    </li>
                    <li class="list-group-item">
                        <button
                            type="submit"
                            class="btn btn-success"
                        >
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                            Agregar
                        </button>
                    </li>                    
                </ul>
            </form>
        </div>
    </div>
@endsection
