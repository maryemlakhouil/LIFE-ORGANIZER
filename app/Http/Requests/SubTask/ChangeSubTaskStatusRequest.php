<?php

namespace App\Http\Requests\SubTask;

use Illuminate\Foundation\Http\FormRequest;

class ChangeSubTaskStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('api')->check();
    }

    public function rules(): array
    {
        return [
            'is_completed' => ['required', 'boolean'],
        ];
    }
}