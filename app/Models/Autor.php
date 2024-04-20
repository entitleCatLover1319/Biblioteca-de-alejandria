<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Autor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'autor';
    protected $fillable = ['nombre'];

    public function libros(): HasMany {
        return $this->hasMany(Libro::class);
    }
}
