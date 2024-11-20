<?php

namespace App\Models;

use App\Models\Materia;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MateriaAbierta extends Model
{
    use HasFactory;

    protected $fillable = [
        'materia_id',
        'periodo_id',
        'carrera_id',
    ];

    // Relación con Materia
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }

    // Relación con Carrera
    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    // Relación con Periodo
    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }

    // Relación hasMany con Grupo
    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class, 'materia_abierta_id');
    }
}

