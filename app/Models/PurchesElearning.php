<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchesElearning extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'e_learning_id',
        'price',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eLearning()
    {
        return $this->belongsTo(Elearning::class, 'e_learning_id');
    }
}
