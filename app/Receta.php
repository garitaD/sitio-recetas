<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //Campos que se agregaran (es importante definirlos, de lo contrario nos dará un error)
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];

    //Obtiene la categoria de la receta via FK
    public function categoria(){
        //Usamos belongsTo dado a que la relacion es inversa (lo podemos probar con php artisan tiker || $receta->categoria)
        return $this->belongsTo(CategoriaReceta::class);
    }
}
