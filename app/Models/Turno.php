<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turno extends Model
{
    use HasFactory;
    public function trabajos(): HasMany
    {
        return $this->hasMany(Trabajo::class);
    }
}
