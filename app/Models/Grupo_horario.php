<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo_Horario extends Model
{
    use HasFactory;

    protected $fillable = ['grupo_id', 'lugar_id', 'dia', 'hora'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function lugar()
    {
        return $this->belongsTo(Lugares::class);
    }
}
