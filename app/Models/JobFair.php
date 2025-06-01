<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobFair extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'fair_type',
        'address',
    ];
}
