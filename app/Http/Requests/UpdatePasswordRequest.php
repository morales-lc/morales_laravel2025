<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Handles validation for updating user password (old, new, confirm password).
class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:new_password',
        ];
    }

    public function messages(): array
    {
        return [
            'confirm_password.same' => 'New passwords do not match.',
        ];
    }
}
// This class handles the validation of the password update.