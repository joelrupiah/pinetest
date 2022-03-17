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

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

}
