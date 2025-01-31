<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MigrationCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_bn',
        'status',
    ];
}
