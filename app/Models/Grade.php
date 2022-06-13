<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    // public function fee(): BelongsTo
    // {
    //     return $this->belongsTo(Fee::class);
    // }

    public function fees(): HasMany
    {
        return $this->hasMany(Fee::class);
    }

}
