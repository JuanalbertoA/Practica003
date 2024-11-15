<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'RFC', 
        'nombres', 
        'apellidop', 
        'apellidom', 
        'licenciatura', 
        'lictit', 
        'especializacion', 
        'esptit', 
        'maestria', 
        'maetit', 
        'doctorado', 
        'doctit', 
        'fechaingsep', 
        'fechaingins', 
        'depto_id', 
        'puesto_id',
    ];

    // Relación con Deptos (depto_id)
    public function depto()
    {
        return $this->belongsTo(Depto::class);
    }

    // Relación con Puestos (puesto_id)
    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }
}
