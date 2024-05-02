<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = [
        'libro_id',
        'user_id',
        'contenido',
        'puntaje',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function libro(): BelongsTo {
        return $this->belongsTo(Libro::class);
    }

}
