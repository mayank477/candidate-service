<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAwardRequest extends FormRequest
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
            'name' => ['string', 'sometimes'],
            'date_received' => ['date_format:Y-m-d', 'sometimes', 'nullable'],
            'description' => ['string', 'sometimes', 'nullable'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(arrayKeysToSnakeCase($this->input()));
    }
}
