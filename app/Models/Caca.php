<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caca extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'audio'
    ];
}
