<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    use HasFactory;
    public function trabajos(): HasMany
    {
        return $this->hasMany(Trabajo::class);
    }
}
