<?php

namespace App\Http\Requests\Conversation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('api')->check();
    }

    public function rules(): array
    {
        return [
            'type' => ['sometimes', 'required', 'in:direct,group'],
            'title' => ['nullable', 'string', 'max:255'],
        ];
    }
}