<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'hobbies' => 'array|min:1',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
