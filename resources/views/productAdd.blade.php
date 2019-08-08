@extends('layouts.app')

@section('title', 'Productos')

@section('app-styles')
    <style type="text/css">
        .product_card {
            width: 18rem;
            margin: 0 1rem;
        }
        #fileToUpload{width: 180px}
    </style>
@endsection

@section('content')
    <div class="container">

        <div class="d-flex justify-content-center">
            <form method="post" action="add" enctype="multipart/form-data">
                @csrf
                <h1>Agregar Productos</h1>
                <div class="card product_card">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Nombre:</strong> <input class="form-control" type="text" name="nombre" required>
                        </li>
                        <li class="list-group-item">
                            <strong>Descripción:</strong> <input class="form-control"  type="text" name="descripcion" required>
                        </li>
                        <li class="list-group-item">
                            <strong>Tipo de producto:</strong>
                            <select name="type" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                @foreach($productsTypes as $type)
                                    <option value="{{$type['id']}}">{{$type['name']}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="list-group-item">
                            <strong>Marca de producto:</strong>
                            <select name="brand" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand['id']}}">{{$brand['name']}}</option>
                                @endforeach
                            </select>
                        </li>

                        <li class="list-group-item">
                            <strong>Selecciona una imagen:</strong>
                            <input type="file" name="fileToUpload" id="fileToUpload" required class="btn btn-success">
                        </li>

                      </ul>
                      <button type="submit" class="btn btn-success"> <i class="fa fa-plus-square" aria-hidden="true"></i> Agregar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
