<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'reviewer_name',
        'reviewer_email',
        'reviewer_title',
        'rating',
        'comment',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
