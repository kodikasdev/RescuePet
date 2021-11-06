<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerdidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdidos', function (Blueprint $table) {
            $table->id();
            $table->string('Especie');
            $table->string('Estatus');
            $table->string('Sexo');
            $table->string('Peso');
            $table->string('Tamaño');
            $table->string('Descripcion');
            $table->string('Sarna');
            $table->string('Heridas');
            $table->string('Sano');
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
        Schema::dropIfExists('perdidos');
    }
}
