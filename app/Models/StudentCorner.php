<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCorner extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_corner_category_id',
        'country_id',
        'level_type',
        'title',
        'date',
        'image',
        'link',
        'details',
        'status',
    ];

    public function studentCornerCategory()
    {
        return $this->belongsTo(StudentCornerCategory::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
