<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'long_name',
        'short_name',
//        'locality',
//        'sublocality',
//        'postal_code',
//        'country',
//        'administrative_area_level_1',
//        'administrative_area_level_2',
//        'name',
    ];
}
