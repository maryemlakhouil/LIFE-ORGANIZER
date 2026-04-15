<?php

namespace App\Http\Requests\Family;

use Illuminate\Foundation\Http\FormRequest;

class ManageFamilyMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('api')->check();
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}