<?php

namespace App\Models\adopcion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedade extends Model
{
    use HasFactory;

    protected $fillable = [
        'Enfermedad'
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
