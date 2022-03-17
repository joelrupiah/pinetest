<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_id',
        'parent_name',
        'parent_phone',
        'parent_email',
        'student_name',
        'student_age'
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
}