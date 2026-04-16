<?php

namespace App\Http\Requests\Call;

use Illuminate\Foundation\Http\FormRequest;

class SendCallSignalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('api')->check();
    }

    public function rules(): array
    {
        return [
            'signal_type' => ['required', 'in:offer,answer,ice-candidate'],
            'signal' => ['required', 'array'],
            'target_user_id' => ['nullable', 'integer', 'exists:users,id'],
        ];
    }
}
