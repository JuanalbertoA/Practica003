<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'documentacions';

    /**
     * Campos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'curp',
        'certificado',
        'cdomi',
        'actanac',
        'tipoinsc_id',
        'alumnos_id',
    ];

    /**
     * Relación con el modelo Tipoinsc.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoinsc()
    {
        return $this->belongsTo(Tipoinsc::class, 'tipoinsc_id');
    }

    /**
     * Relación con el modelo Alumno.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumnos_id');
    }
}
