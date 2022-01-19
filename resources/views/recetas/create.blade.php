@extends('layouts.app')

{{-- Dentro de las vistas laravel/blade incluye los "yield" que son espacios para insertar contenido
para insertar en esas secciones se hace así: --}}

@section('botones')
<a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
    

@endsection

@section('content')
    <h2 class="text-center mb-5">Crear Nueva Receta</h2>

   

@endsection

