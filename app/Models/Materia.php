<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';

    protected $fillable = [
        'idmateria',
        'nombremateria',
        'nivel',
        'nombremediano',
        'nombrecorto',
        'modalidad',
        'reticula_id', // Relación con Reticula
    ];

    // Definir la relación con el modelo Reticula
    public function reticula()
    {
        return $this->belongsTo(Reticula::class);
    }
}
