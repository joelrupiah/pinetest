<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_id',
        'email',
        'status',
        'little_pines',
        'play_group',
        'pp_one',
        'pp_two',
        'grade_one',
        'grade_two',
        'grade_three',
        'grade_four',
        'grade_five',
        'grade_six'
    ];

    protected $casts = [
        'grade_id' => 'array',
    ];

    // public function grades(): HasMany
    // {
    //     return $this->hasMany(Grade::class);
    // }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

}
