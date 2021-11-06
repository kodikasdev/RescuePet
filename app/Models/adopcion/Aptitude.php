<?php

namespace App\Models\adopcion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aptitude extends Model
{
    use HasFactory;

    protected $fillable = [
        'Dato'
    ];

    public function mascotas()
    {
        return $this->belongsToMany(Mascota::class);
    }
}
