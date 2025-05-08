<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string', // Ensure the username is required and is a string
            'password' => 'required|string', // Ensure the password is required and is a string
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Please enter your username.', // Custom error message for missing username
            'password.required' => 'Please enter your password.', // Custom error message for missing password
        ];
    }
}