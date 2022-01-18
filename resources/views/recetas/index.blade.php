@extends('layouts.app')

{{-- Dentro de las vistas laravel/blade incluye los "yield" que son espacios para insertar contenido
para insertar en esas secciones se hace así: --}}

@section('content')
    <h1>Recetas</h1>

    @foreach($recetas as $receta)
        <li>{{$receta}}</li>
        
    @endforeach

    <h1>Categorias</h1>
    @foreach($categorias as $categoria)
        <li>{{$categoria}}</li>    
    @endforeach

@endsection

