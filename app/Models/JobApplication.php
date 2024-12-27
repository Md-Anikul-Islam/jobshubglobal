<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'user_id',
        'company_id',
    ];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Company
    public function company()
    {
        return $this->belongsTo(User::class);
    }
}
