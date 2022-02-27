<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'start_date',
        'end_date',
        'description',
        'start_time',
        'end_time',
        'eventDescription',
        'eventContent',
        'topics',
        'host',
        'location',
        'students',
        'assessments'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];
}
