<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(){

        //Mostrar las recetas por cantidad de votos
        //$votadas = Receta::has('likes', '=', 1)->get(); ->para hacer un buscador
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();


        //Obtener las recetas más nuevas
        //$nuevas = Receta::orderBy('created_at', 'ASC')->get();
        $nuevas = Receta::latest()->limit(4)->get();

        //Obtener todas las categorias
        $categorias = CategoriaReceta::all();
        // return $categorias;

        //Agrupar las recetas por categoría
        $recetas = [];

        foreach($categorias as $categoria){
            $recetas[ Str::slug($categoria->nombre) ][] = Receta::where('categoria_id', $categoria->id)->take(3)->get();
        }

        // return $recetas;

        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
