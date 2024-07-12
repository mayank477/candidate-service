<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseChapterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string'],
            'description' => ['string', 'nullable'],
            'position' => ['int', 'min:1', 'sometimes', 'nullable'],
            'isPublished' => ['bool', 'sometimes', 'nullable'],
            'isFree' => ['sometimes', 'bool', 'nullable'],
            'imageUrl' => ['sometimes', 'url', 'nullable'],
            'videoUrl' => ['sometimes', 'url', 'nullable'],
        ];
    }
}
