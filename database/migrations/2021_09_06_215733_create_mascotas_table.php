<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Especie');
            $table->string('Estatus')->default('En adopción');
            $table->string('Raza');
            $table->string('Sexo');
            $table->date('Nacimiento');
            $table->string('Edad');
            $table->float('Peso');
            $table->string('Tamaño');
            $table->string('Descripcion');
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
        Schema::dropIfExists('mascotas');
    }
}
