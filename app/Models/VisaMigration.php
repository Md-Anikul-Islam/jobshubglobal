<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaMigration extends Model
{
    use HasFactory;
    protected $fillable = [
        'migration_category_id',
        'title',
        'title_bn',
        'date',
        'image',
        'link',
        'details',
        'details_bn',
        'status',
    ];

    public function migrationCategory()
    {
        return $this->belongsTo(MigrationCategory::class);
    }
}
