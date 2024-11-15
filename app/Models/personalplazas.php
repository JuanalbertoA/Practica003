<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personalplazas extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla
    protected $table = 'personalplazas';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'tiponombramiento',
        'plaza_id',
        'personal_id',
    ];

    // Relación con Plaza
    public function plaza()
    {
        return $this->belongsTo(Plaza::class, 'plaza_id');
    }

    // Relación con Personal
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id');
    }
}


