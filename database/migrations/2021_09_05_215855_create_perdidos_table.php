<?php

use App\Models\perdido\Perdido;
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
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();
            $table->string('Especie');
            $table->enum('Estatus', [Perdido::Adoptado, Perdido::Publicado])->default(Perdido::Adoptado);
            $table->string('Sexo');
            $table->float('Peso');
            $table->string('Tamaño');
            $table->string('Descripcion');
            $table->string('Sarna');
            $table->string('Heridas');
            $table->string('Sano');
            $table->foreign('user_id')->references('id')->on('users');
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
