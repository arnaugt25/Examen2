<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type_id',
        'image'
    ];

    public function type() {
        return $this->BelongsTo(Type::class);
    }
}
