<?php

namespace App\Models\perdido;

use App\Models\adopcion\Localizacione;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perdido extends Model
{
    use HasFactory;

    const Adoptado = 1;
    const Publicado = 2;

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


    public function localizacione()
    {
        return $this->hasOne(Localizacione::class);
    }

    //Relación uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    //Relación uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
}
