<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'type' => $this->type,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
            'featured_image' => $this->featured_image,
            'featured_image_url' => $this->featured_image_url,
            'tags' => $this->tags,
            'status' => $this->status,
            'is_featured' => $this->is_featured,
            'client' => $this->client,
            'duration' => $this->duration,
            'technologies' => $this->technologies,
            'overview' => $this->overview,
            'result_1_value' => $this->result_1_value,
            'result_1_title' => $this->result_1_title,
            'result_1_description' => $this->result_1_description,
            'result_2_value' => $this->result_2_value,
            'result_2_label' => $this->result_2_label,
            'result_3_title' => $this->result_3_title,
            'result_3_description' => $this->result_3_description,
            'impl_1_title' => $this->impl_1_title,
            'impl_1_description' => $this->impl_1_description,
            'impl_2_title' => $this->impl_2_title,
            'impl_2_description' => $this->impl_2_description,
            'impl_3_title' => $this->impl_3_title,
            'impl_3_description' => $this->impl_3_description,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
