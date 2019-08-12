@extends('layouts.app')

@section('title', $product->name)

@section('app-styles')
    <style type="text/css">
        .background-img {
            width: 100%;
            height: 60vh;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
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
        <div
            class="background-img"
            style="background-image: url({{ $product->img_src }});">
        </div>
        <h1 class="mt-sm-3 mb-sm-5">{{ $product->name }}</h1>
        <p class="lead">{{ $product->description }}</p>
    </div>
@endsection
