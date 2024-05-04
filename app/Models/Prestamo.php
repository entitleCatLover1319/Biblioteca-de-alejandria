<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'libro_id',
        'copia_libro_id',
        'fecha_devolucion',
        'dias_atraso',
        'created_at',
        'updated_at',
    ];

    protected $table = 'prestamos';

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function libro(): BelongsTo {
        return $this->belongsTo(Libro::class);
    }

    public function copiaLibro(): BelongsTo {
        return $this->BelongsTo(CopiaLibro::class);
    }
}
