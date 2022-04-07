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
        'headingOne',
        'headingTwo',
        'headingThree',
        'headingFour',
        'headingFive',
        'headingSix',
        'headingSeven',
        'descriptionOne',
        'descriptionTwo',
        'descriptionThree',
        'descriptionFour',
        'descriptionFive',
        'descriptionSix',
        'descriptionSeven',
        'imageOne',
        'imageTwo',
        'video'
    ];
}