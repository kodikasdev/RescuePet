<?php

use App\Models\adopcion\Mascota;
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
            $table->enum('Estatus', [Mascota::Adoptado, Mascota::Publicado])->default(Mascota::Adoptado);
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
