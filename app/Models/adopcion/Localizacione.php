<?php

namespace App\Models\adopcion;

use App\Models\perdido\Perdido;
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
    public function perdido()
    {
        return $this->belongsTo(Perdido::class);
    }
}
