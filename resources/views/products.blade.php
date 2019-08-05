@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <h1>Bienvenido!</h1>
    <p>Acaso eres administrador? <?php echo $isAdmin; ?></p>
@endsection
