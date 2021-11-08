<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id')->nullable()->unsigned();
            $table->unsignedBigInteger('perdido_id')->nullable()->unsigned();
            $table->string('Estado');
            $table->string('Municipio');
            $table->string('Direccion');
            //Llaves Foráneas
            $table->foreign('mascota_id')->references('id')->on('mascotas');
            $table->foreign('perdido_id')->references('id')->on('perdidos');
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
        Schema::dropIfExists('localizaciones');
    }
}
