<?php

namespace App\Models\perdido;

use App\Models\adopcion\Localizacione;
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


    public function localizacione()
    {
        return $this->hasOne(Localizacione::class,'mascota_id');
    }

}
