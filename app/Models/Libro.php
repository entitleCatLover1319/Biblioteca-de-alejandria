<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Libro extends Model
{
    Use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'libro';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['titulo'];

    public function autor(): BelongsTo {
        return $this->belongsTo(Autor::class);
    }

    public function copias(): HasMany {
        return $this->hasMany(CopiaLibro::class);
    }

    public function reviews(): HasMany {
        return $this->hasMany(Review::class);
    }

    public function usersReviewed(): BelongsToMany {
        return $this->belongsToMany(User::class, 'review', 'libro_id', 'user_id')
            ->as('review')
            ->withPivot('contenido', 'puntaje')
            ->withTimestamps();
    }
}
