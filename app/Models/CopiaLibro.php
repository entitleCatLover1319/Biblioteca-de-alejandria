<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


class CopiaLibro extends Model
{
    Use HasFactory;
    use SoftDeletes;
    protected $table = 'copia_libro';
    protected $fillable = [
        'isbn_13',
        'isbn_10',
        'edicion',
        'ano_publicacion',
        'portada',
    ];

    public function libro(): BelongsTo {
        return $this->belongsTo(Libro::class);
    }

    public function editorial(): BelongsTo {
        return $this->belongsTo(Editorial::class);
    }

    public function prestamo(): HasOne {
        return $this->hasOne(Prestamo::class);
    }
}
