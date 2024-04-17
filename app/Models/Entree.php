<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entree extends Model
{
    use HasFactory;

    public function piece(): BelongsTo
    {
        return $this->belongsTo(Piece::class);
    }
}
