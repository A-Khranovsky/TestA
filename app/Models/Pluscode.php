<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pluscode extends Model
{
    use HasFactory;

    protected $fillable = [
        'compound_code',
        'global_code',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
