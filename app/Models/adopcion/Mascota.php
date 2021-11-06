<?php

namespace App\Models\adopcion;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nombre',
        'Especie',
        'Estatus',
        'Raza',
        'Sexo',
        'Nacimiento',
        'Edad',
        'Peso',
        'Tamaño',
        'Descripcion'
    ];

    //Relaciones uno a uno

    public function comportamiento()
    {
        return $this->hasOne(Comportamiento::class);
    }

    public function localizacione()
    {
        return $this->hasOne(Localizacione::class);
    }


    //Relaciones muchos a muchos

    public function aptitudes()
    {
        return $this->belongsToMany(Aptitude::class);
    }

    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedade::class);
    }

    public function entregas()
    {
        return $this->belongsToMany(Entrega::class);
    }

    //Relación uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
