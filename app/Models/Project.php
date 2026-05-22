<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'subtitle',
        'description',
        'featured_image',
        'tags',
        'status',
        'is_featured',
        'client',
        'duration',
        'technologies',
        'overview',
        'result_1_value',
        'result_1_title',
        'result_1_description',
        'result_2_value',
        'result_2_label',
        'result_3_title',
        'result_3_description',
        'impl_1_title',
        'impl_1_description',
        'impl_2_title',
        'impl_2_description',
        'impl_3_title',
        'impl_3_description',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            // Check if it's an external URL (starts with http)
            if (str_starts_with($this->featured_image, 'http')) {
                return $this->featured_image;
            }
            return asset('storage/projects/' . $this->featured_image);
        }
        return null;
    }

    /**
     * Get the full URL for the featured image.
     */
    // public function featuredImageUrl(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => $this->featured_image
    //             ? Storage::disk('public')->url('projects/' . $this->featured_image)
    //             : null,
    //     );
    // }
}
