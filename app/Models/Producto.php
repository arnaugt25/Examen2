<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Define qué campos pueden ser asignados masivamente (seguridad)
    protected $fillable = [
        'nombre',       // Nombre del producto
        'descripcion',  // Descripción del producto (opcional)
        'precio',       // Precio del producto
        'stock'         // Cantidad en stock
    ];
}
