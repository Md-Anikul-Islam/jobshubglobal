<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elearning extends Model
{
    use HasFactory;
    protected $fillable = [
        'elearning_category_id',
        'title',
        'details',
        'fee',
        'image',
        'status',
    ];

    public function elearningCategory()
    {
        return $this->belongsTo(ElearningCategory::class);
    }
}
