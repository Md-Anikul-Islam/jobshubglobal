<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'category_id',
        'location_id',
        'title',
        'title_bn',
        'vacancy',
        'address',
        'address_bn',
        'salary',
        'deadline',
        'details',
        'details_bn',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(User::class,'company_id');
    }
}
