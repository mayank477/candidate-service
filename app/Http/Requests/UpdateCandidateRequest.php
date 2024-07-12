<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCandidateRequest extends FormRequest
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
            'name' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', Rule::unique('candidates', 'email')->ignoreModel($this->route('candidate'))],
            'phone_number' => ['sometimes', 'numeric'],
            'nationality' => ['sometimes', 'string'],
            'dob' => ['sometimes', 'date_format:Y-m-d'],
            'address' => ['sometimes', 'string', 'nullable'],
            'linked_in_url' => ['sometimes', 'url', 'nullable'],
            'github_url' => ['sometimes', 'url', 'nullable'],
            'place_of_birth' => ['sometimes', 'string'],
            'years_of_experience' => ['sometimes', 'numeric', 'min:1']
        ];
    }
}
