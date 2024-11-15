<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugares extends Model
{
    use HasFactory;

    // Define el nombre de la tabla en la base de datos (opcional si sigue las convenciones)
    protected $table = 'lugares';

    // Define los atributos que se pueden asignar en masa
    protected $fillable = [
        'nombrelugar',
        'nombrecorto',
        'edificio_id',
    ];

    // Relación con el modelo Edificio (un lugar pertenece a un edificio)
    public function edificio()
    {
        return $this->belongsTo(Edificios::class);
    }
}
