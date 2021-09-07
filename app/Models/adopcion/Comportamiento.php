<?php

namespace App\Models\adopcion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comportamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'Otros',
        'Extraños',
        'Ruidoso'
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
