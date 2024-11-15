<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Depto extends Model
{
    use HasFactory;

    protected $fillable =['iddepto','nombredepto','nombremediano','nombrecorto'];

    public function carreras(): HasMany{
        return $this->hasMany(Carrera::class);
    }

    public function personal(): HasMany{
        return $this->hasMany(Personal::class);
    }
}
