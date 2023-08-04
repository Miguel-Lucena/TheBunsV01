<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trabajo extends Model
{
    use HasFactory;
    public function empleado(): BelongsTo
    {
    return $this->belongsTo(Empleado::class, 'empleado_id');
    }
    public function turno(): BelongsTo
    {
    return $this->belongsTo(Turno::class, 'turno_id');
    }
}
