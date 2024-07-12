<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCandidateRequest extends FormRequest
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
            'job_title' => ['sometimes', 'string', 'nullable'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:candidates'],
            'phone_number' => ['required', 'numeric'],
            'nationality' => ['required', 'string'],
            'dob' => ['sometimes', 'date_format:Y-m-d'],
            'address' => ['sometimes', 'string', 'nullable'],
            'linked_in_url' => ['sometimes', 'url', 'nullable'],
            'github_url' => ['sometimes', 'url', 'nullable'],
            'place_of_birth' => ['required', 'string'],
            'years_of_experience' => ['required', 'numeric', 'min:1']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(arrayKeysToSnakeCase($this->input()));
    }
}
