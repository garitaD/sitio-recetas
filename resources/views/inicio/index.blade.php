@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mb-4">Ultimas Recetas</h2>

        <div class="owl-carousel owl-theme">
            @foreach($nuevas as $nueva)
                <div class="card">
                    <img src="/storage/{{$nueva->imagen}}" class="card-img-top" alt="Imagen de una receta">
                    <div class="card-body">
                        <h3>{{Str::title( $nueva->titulo)}}</h3>
                        {{-- strip_tags es una funcion que elimina las etiquetas html de un string--}}
                        <p>{{Str::words(strip_tags($nueva->preparacion), 15 )}}</p>
                        <a href="{{route('recetas.show', ['receta' => $nueva->id ])}}" 
                            class="btn btn-primary d-block font-weight-bold text-uppercase">
                            Ver Receta
                        </a>
                    </div>
                </div>
                
            @endforeach
        </div>

    </div>

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas más votadas</h2>
        <div class="row">
            {{-- votadas es lo que estamos pasando por compact en el controlador --}}
            @foreach ($votadas as $receta)
                @include('ui.receta')
            @endforeach
        </div>
    </div>

    @foreach($recetas as $key => $grupo)
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{ str_replace('-',' ', $key) }}</h2>
            <div class="row">
                {{-- Este foreach obtiene todas las recetas en un solo array por lo que hay que recorrerlo con otro array para obtener cada receta por separado --}}
                @foreach ($grupo as $recetas) 
                    @foreach ($recetas as $receta)
                        @include('ui.receta')
                    @endforeach
                    
                @endforeach
            </div>
        </div>
        
    @endforeach

@endsection