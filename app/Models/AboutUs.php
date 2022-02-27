<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'description',
        'headerOne',
        'headerTwo',
        'headerThree',
        'headerFour',
        'descriptionOne',
        'descriptionTwo',
        'descriptionThree',
        'descriptionFour',
        'descriptionFive',
        'image',
        'video'
    ];
}