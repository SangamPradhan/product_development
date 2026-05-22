<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:100'],
            'subtitle' => ['sometimes', 'required', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
            'tags' => ['nullable', 'string'],
            'status' => ['sometimes', 'required', 'string', 'max:50'],
            'is_featured' => ['nullable', 'boolean'],
            'client' => ['nullable', 'string'],
            'duration' => ['nullable', 'string'],
            'technologies' => ['nullable', 'string'],
            'overview' => ['nullable', 'string'],
            'result_1_value' => ['nullable', 'string'],
            'result_1_title' => ['nullable', 'string'],
            'result_1_description' => ['nullable', 'string'],
            'result_2_value' => ['nullable', 'string'],
            'result_2_label' => ['nullable', 'string'],
            'result_3_title' => ['nullable', 'string'],
            'result_3_description' => ['nullable', 'string'],
            'impl_1_title' => ['nullable', 'string'],
            'impl_1_description' => ['nullable', 'string'],
            'impl_2_title' => ['nullable', 'string'],
            'impl_2_description' => ['nullable', 'string'],
            'impl_3_title' => ['nullable', 'string'],
            'impl_3_description' => ['nullable', 'string'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('is_featured')) {
            $this->merge([
                'is_featured' => $this->boolean('is_featured'),
            ]);
        }
    }
}
