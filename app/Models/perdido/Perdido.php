<?php

namespace App\Models\perdido;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perdido extends Model
{
    use HasFactory;

    protected $fillable = [
        'Especie',
        'Estatus',
        'Sexo',
        'Peso',
        'Tamaño',
        'Descripcion',
        'Sarna',
        'Heridas',
        'Sano'
    ];

}
