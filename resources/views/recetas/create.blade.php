@extends('layouts.app')

{{-- Dentro de las vistas laravel/blade incluye los "yield" que son espacios para insertar contenido
para insertar en esas secciones se hace así: --}}

@section('botones')
<a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
    

@endsection

@section('content')
    <h2 class="text-center mb-5">Crear Nueva Receta</h2>

    <div class="row justify-content-center mt-5" >
        <div class="col-md-8">
            <form method="POST" action="{{route('recetas.store')}}" novalidate>
                @csrf {{--Para validar que un request se haga desde un form de la misma pag ;larevel usa un token, el cual hay que poner dentro del from (csrf) para que lo permita--}}
                <div class="form-group">
                    <label for="titutlo">Titulo Receta</label>
                    <input type="text" 
                        name="titulo" 
                        class="form-control @error('titulo') is-invalid @enderror"
                        id="titulo"
                        placeholder="Titulo de la receta"
                        value="{{old('titulo')}}"
                    />

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        
                    @enderror

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>
            </form>
        </div>

    </div>

   

@endsection

