<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoHorarios21318 extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo_id',
        'lugar_id',
        'dia',
        'hora',
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo21318::class, 'grupo_id');
    }

    public function lugar()
    {
        return $this->belongsTo(Lugares::class, 'lugar_id');
    }
}

