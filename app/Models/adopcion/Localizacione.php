<?php

namespace App\Models\adopcion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacione extends Model
{
    use HasFactory;

    protected $fillable = [
        'Estado',
        'Municipio',
        'Direccion'
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
