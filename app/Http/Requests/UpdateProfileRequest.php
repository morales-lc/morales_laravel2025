<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:50|regex:/^[a-zA-Z\s\'\-]+$/', // Validate first name with regex for letters, spaces, hyphens, and apostrophes
            'last_name' => 'required|string|max:50|regex:/^[a-zA-Z\s\'\-]+$/', // Validate last name with regex for letters, spaces, hyphens, and apostrophes
            'username' => 'required|string|max:100|unique:usersinfo,username,' . session('user')->id . ',id', // Ensure username is unique except for the current user
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.regex' => 'The first name may only contain letters, spaces, hyphens, and apostrophes.', // Custom error message for invalid first name
            'last_name.regex' => 'The last name may only contain letters, spaces, hyphens, and apostrophes.', // Custom error message for invalid last name
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'first_name' => ucwords(strtolower(trim($this->first_name))), // Normalize the first name (trim, lowercase, and capitalize)
            'last_name' => ucwords(strtolower(trim($this->last_name))), // Normalize the last name (trim, lowercase, and capitalize)
            'username' => trim($this->username), // Trim whitespace from the username
        ]);
    }
}