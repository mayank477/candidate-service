<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'description' => ['sometimes', 'nullable'],
            'image_url' => ['sometimes', 'url', 'nullable'],
            'category' => ['sometimes', 'string', 'nullable'],
            'is_published' => ['sometimes', 'nullable', 'boolean']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(
            arrayKeysToSnakeCase($this->input())
        );
    }
}
