<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'           => ['required', 'string', 'max:255'],
            'status'         => ['required', 'in:available,pending,sold'],
            'photoUrls'      => ['nullable', 'array'],
            'photoUrls.*'    => ['nullable', 'url'],
            'tags'           => ['nullable', 'array'],
            'tags.*.name'    => ['nullable', 'string'],
        ];
    }
}
