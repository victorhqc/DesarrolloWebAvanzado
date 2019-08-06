@extends('layouts.app')

@section('title', 'Productos')

@section('app-styles')
    <style type="text/css">
        .product_card {
            width: 18rem;
            margin: 0 1rem;
        }
    </style>
@endsection

@section('topbar')
    @component('layouts.navigation', [
        'login_text' => $email ? 'Cerrar sesión' : 'Iniciar sesión',
        'login_url' => $email ? url("/logout") : url("/login"),
        'email' => $email
    ])
    @endcomponent
@endsection

@section('content')
    <div class="container">
        <h1>Productos</h1>
        <div class="d-flex flex-row">
            @foreach($products as $product)
                <div class="card product_card">
                    <img src="<?php echo $product->img_src ?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product->name ?></h5>
                        <p class="card-text"><?php echo $product->description ?></p>
                        <a
                            href="<?php echo url("/product/$product->id") ?>"
                            class="btn btn-primary">
                            Ver producto
                        </a>
                        @if($isAdmin)
                            <!-- TODO: Añadir funcionamiento de eliminar -->
                            <a href="#" class="btn btn-danger">
                                Eliminar
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
