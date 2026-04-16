<?php

namespace App\Http\Requests\Call;

use Illuminate\Foundation\Http\FormRequest;

class StartCallRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('api')->check();
    }

    public function rules(): array
    {
        return [
            'type' => ['required', 'in:audio,video'],
            'target_user_id' => ['nullable', 'integer', 'exists:users,id'],
        ];
    }
}
