<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:50|regex:/^[a-zA-Z\s\'\-]+$/', // Validate first name with regex for letters, spaces, hyphens, and apostrophes
            'lastname' => 'required|string|max:50|regex:/^[a-zA-Z\s\'\-]+$/', // Validate last name with regex for letters, spaces, hyphens, and apostrophes
            'bod' => 'required|date', // Ensure the birthday is a valid date
            'sex' => 'required|in:Male,Female', // Ensure the sex is either 'Male' or 'Female'
            'email' => 'required|email|unique:usersinfo,email', // Validate email and ensure it is unique in the usersinfo table
            'username' => 'required|string|unique:usersinfo,username', // Validate username and ensure it is unique in the usersinfo table
            'password' => 'required|string|min:8', // Ensure the password is at least 8 characters long
            'terms' => 'accepted', // Ensure the terms and conditions are accepted
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.regex' => 'The first name may only contain letters, spaces, hyphens, and apostrophes.', // Custom error message for invalid first name
            'lastname.regex' => 'The last name may only contain letters, spaces, hyphens, and apostrophes.', // Custom error message for invalid last name
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'firstname' => ucwords(strtolower(trim($this->firstname))), // Normalize the first name (trim, lowercase, and capitalize)
            'lastname' => ucwords(strtolower(trim($this->lastname))), // Normalize the last name (trim, lowercase, and capitalize)
            'username' => trim($this->username), // Trim whitespace from the username
        ]);
    }
}