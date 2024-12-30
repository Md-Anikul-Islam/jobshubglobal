<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'office_name',
        'office_name_bn',
        'designation',
        'designation_bn',
        'year_of_experience',
    ];
}
