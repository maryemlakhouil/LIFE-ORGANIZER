<?php

namespace App\Http\Requests\Attachment;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageAttachmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth('api')->check();
    }

    public function rules(): array
    {
        return [
            'message_id' => ['required', 'exists:messages,id'],
            'file' => ['required', 'file', 'max:5120'],
        ];
    }
}