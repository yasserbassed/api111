<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    /** @use HasFactory<\Database\Factories\LevelFactory> */
    use HasFactory;

    protected $fillable = [
        'level',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(user::class);
    }
}
