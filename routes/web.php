<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Name es el nombre con el cual se va a hacer la referencia
Route::get('/', 'InicioController@index')->name('inicio.index');

//Routing 
//-> cuando los usuarios visiten /recetas se va a ejecutar el controlador RectaController
//name es como un alias que nos permite hacer referencia a él en los enlaces en html
//{receta} lo que hace es obtener el id 
Route::get('/recetas', 'RecetaController@index')->name('recetas.index');
Route::get('/recetas/create', 'RecetaController@create')->name('recetas.create');
Route::post('/recetas/create', 'RecetaController@store')->name('recetas.store');
Route::get('/recetas/{receta}', 'RecetaController@show')->name('recetas.show');
Route::get('/recetas/{receta}/edit', 'RecetaController@edit')->name('recetas.edit');
Route::put('/recetas/{receta}', 'RecetaController@update')->name('recetas.update');
Route::delete('/recetas/{receta}', 'RecetaController@destroy')->name('recetas.destroy');

//Route::resource('recetas', 'RecetaController'); ->esto puede ser utlizado en lugar de todos los metodos anteriores

Route::get('/perfiles/{perfil}','PerfilController@show')->name('perfiles.show');
Route::get('/perfiles/{perfil}/edit','PerfilController@edit')->name('perfiles.edit');
Route::put('/perfiles/{perfil}','PerfilController@update')->name('perfiles.update');

//Almacena los likes de las recetas
Route::post('/recetas/{receta}', 'LikesController@update')->name('likes.update');


Auth::routes();