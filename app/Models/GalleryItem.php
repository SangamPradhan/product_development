<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'source',
        'file_path',
        'embed_url',
        'category',
        'tags',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function getFileUrlAttribute()
    {
        if ($this->file_path) {
            if (str_starts_with($this->file_path, 'http')) {
                return $this->file_path;
            }
            return asset('storage/gallery/' . $this->file_path);
        }
        return null;
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->type === 'video' && $this->source === 'youtube' && $this->embed_url) {
            // Extract youtube ID
            // Supports: youtube.com/watch?v=ID, youtube.com/embed/ID, youtu.be/ID
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->embed_url, $match)) {
                $youtube_id = $match[1];
                return "https://img.youtube.com/vi/{$youtube_id}/hqdefault.jpg";
            }
        }
        
        return $this->file_url;
    }
}
