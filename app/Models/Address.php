<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'name',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function pluscodes()
    {
        return $this->belongsTo(Pluscode::class);
    }
}
