<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Editorial extends Model
{
    use HasFactory;
    protected $table = 'editorials';
    protected $fillable = ['nombre'];

    public function copias(): HasMany {
        return $this->hasMany(CopiaLibro::class);
    }
}
