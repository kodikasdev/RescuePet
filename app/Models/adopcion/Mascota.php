<?php

namespace App\Models\adopcion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre',
        'Especie',
        'Estado',
        'Raza',
        'Sexo',
        'Nacimiento',
        'Edad',
        'Peso',
        'Tamaño',
        'Descripcion'
    ];
}
