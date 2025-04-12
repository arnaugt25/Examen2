<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'año',
        'genero',
        'Disponibilidad'
    ];
}
