<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_bn',
        'status',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'location_id');
    }

}
