<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'town',
        'address',
        'opening_time',
        'closing_time'
    ];

    
    protected $casts = [
        'opening_time' => 'datetime',
        'closing_time' => 'datetime',
    ];
}
