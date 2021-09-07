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

    public function comportamiento()
    {
        return $this->hasOne(Comportamiento::class);
    }

    public function enfermedades()
    {
        return $this->hasMany(Enfermedade::class);
    }

    public function Entrega()
    {
        return $this->hasMany(Entrega::class);
    }

    public function localizacione()
    {
        return $this->hasOne(Localizacione::class);
    }
}
