<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo',
        'fecha',
        'descripcion',
        'max_alumnos',
        'periodo_id',
        'materia_abierta_id',
        'personal_id',
    ];

    // Relación con Periodo
    public function periodo(): BelongsTo
    {
        return $this->belongsTo(Periodo::class);
    }

    // Relación con MateriaAbierta
    public function materiaAbierta(): BelongsTo
    {
        return $this->belongsTo(MateriaAbierta::class, 'materia_abierta_id');
    }

    // Relación con Personal
    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }
}

