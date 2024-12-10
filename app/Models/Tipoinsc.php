<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoinsc extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'tipoinscs';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'tipo',
        'fecha',
        'periodos_id',
    ];

    /**
     * Relación con el modelo Periodo.
     * Suponiendo que `periodos` es la tabla relacionada.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodos_id');
    }
}
