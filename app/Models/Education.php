<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'institute_name',
        'institute_name_bn',
        'degree_name',
        'degree_name_bn',
        'result',
        'passing_year',
        'status'
    ];
}
