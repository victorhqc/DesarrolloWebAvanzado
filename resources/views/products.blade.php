@extends('layouts.app')

@section('title', 'Productos')

@section('app-styles')
    <style type="text/css">
        .product_card {
            width: 18rem;
        }

        .inline-form {
            display: inline-block;
        }
    </style>
@endsection

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
        <h1 class="mt-sm-3 mb-sm-5">Productos</h1>
        <form
            class="form-inline"
            method="get"
            action="{{ action('ProductsController@showProducts') }}"
        >
            <div class="form-group mx-sm-2 mt-2 mb-5">
                <label for="search" class="sr-only"></label>
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    value="{{ $search }}"
                    placeholder="Buscar productos..."
                />
            </div>
            <button type="submit" class="btn btn-primary mt-2 mb-5">Buscar</button>
        </form>
        <div class="d-flex flex-row">
            @foreach($products as $product)
                <div class="card product_card mx-sm-2">
                    <img src="{{ $product->img_src }}" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <a
                            href="{{ url("/product/$product->id") }}"
                            class="btn btn-primary">
                            Ver producto
                        </a>
                        @if($isAdmin)
                            <form
                                action="{{ action('ProductsController@removeProduct') }}"
                                method="post"
                                class="inline-form"
                                data-form-id="{{$product->id}}"
                            >
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id}}">
                                <button
                                    type="submit"
                                    value="{{$product->id}}"
                                    class="btn btn-danger remove-product"
                                    data-product-id="{{$product->id}}"
                                >
                                    Eliminar
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
