<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Edificios extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreedificio',
        'nombrecorto',
    ];

    public function lugares():HasMany {
        return $this->hasMany(Lugares::class);
    }
}
