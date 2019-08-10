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

@section('content')
    <div class="container">

        <div class="d-flex justify-content-center">
            <form method="post" action="{{ action('TypeController@submitProductType') }}">
                @csrf
                <h1>Tipo o Marca</h1>
                <div class="card product_card">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Seleccione una opción:</strong>
                            <select name="type" class="form-control" required>
                                <option value=""></option>
                                <option value="1">Tipo</option>
                                <option value="2">Marca</option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <strong>Nombre:</strong> <input class="form-control" type="text" name="nombre" required>
                        </li>
                      </ul>
                      <button type="submit" class="btn btn-success"> <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
