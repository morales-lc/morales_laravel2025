<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    public function rules(): array
    {
        return [
            'old_password' => 'required|string', // Ensure the old password is provided and is a string
            'new_password' => 'required|string|min:8', // Ensure the new password is at least 8 characters long
            'confirm_password' => 'required|string|same:new_password', // Ensure the confirmation password matches the new password
        ];
    }

    public function messages(): array
    {
        return [
            'confirm_password.same' => 'New passwords do not match.', // Custom error message for mismatched passwords
        ];
    }
}