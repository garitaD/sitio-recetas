<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        return view('perfiles.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {

        // dd($request['imagen']);

        //Validar la entrada de los datos
        $data=request()->validate([
            'nombre' => 'required',
            'url' => 'required',
            'biografia' => 'required'
        ]);

        //Si el usuario sube una imagen
        if( $request['imagen'] ){
            //Obtener ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');

             //Resize de la imagen
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(600,600);//se tiene que importar la clase
            $img->save();

            //Crear un arreglo de imagen
            $array_imagen = ['imagen' => $ruta_imagen];

        }



        //Asignar nombre y URL
        auth()->user()->url = $data['url'];
        auth()->user()->name = $data['nombre'];
        auth()->user()->save();

        //Eliminar url y name de $data | Ya que no son datos que forman parte de la proxima tabla a actualizar
        unset($data['url']);
        unset($data['nombre']);


        //Guardar Información
        //Asignar Biografia e imagen
        auth()->user()->perfil()->update( array_merge(
            $data,
            $array_imagen ?? [] //en caso de que exista el array con la imagen lo pasa y de lo contrario para uno vacío
        ));

        //Redireccionar

        //Al utilizar action para redireccionar hay que pasarle el controlador y el metodo
        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
