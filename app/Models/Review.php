<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'review';
    protected $fillable = [
        'libro_id',
        'user_id',
        'contenido',
        'puntaje',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function libro(): BelongsTo {
        return $this->belongsTo(Libro::class);
    }

}
