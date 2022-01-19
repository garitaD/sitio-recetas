<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('categoria_receta', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->timestamps();//para saber cuando fue creado y cuando actualizado

        });

        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            //debe ser el mismo nombre definido en los name dentro de html
            $table->string('titulo');
            $table->text('ingredientes');
            $table->text('preparacion');
            $table->string('imagen');
            //Llaves foraneas
            $table->foreignId('user_id')->references('id')->on('users')->comment('Se guarda el id del usuario que crea la receta');
            $table->foreignId('categoria_id')->references('id')->on('categoria_receta')->comment('Se guarda la categoria de la receta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_recetas');
        Schema::dropIfExists('recetas');
    }
}
