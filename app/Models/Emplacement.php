<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Emplacement extends Model
{
    use HasFactory;

    public function pieces(): HasMany
    {
        return $this->hasMany(Piece::class);
    }
}
