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
        <h1>Agregar Productos</h1>
        <div class="d-flex flex-row">
            <form method="post" action="add">
                @csrf
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
                      </ul>
                      <button type="submit" class="btn btn-success">Agregar</button>


     
                </div>
            </form>
           
        </div>
    </div>
@endsection
