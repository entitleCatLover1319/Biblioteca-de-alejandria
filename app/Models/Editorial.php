<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Editorial extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'editorials';
    protected $fillable = ['nombre'];

    public function copias(): HasMany {
        return $this->hasMany(CopiaLibro::class);
    }
}
