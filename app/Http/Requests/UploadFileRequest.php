<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    }

    public function rules(): array
    {
        return [
            'file' => 'required|array', // Ensure the 'file' field is required and must be an array
            'file.*' => 'file|mimes:pdf,png,jpeg,jpg,docx,txt|max:10240', // Validate each file in the array for type and size
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'Please upload at least one file.', // Custom error message for missing files
            'file.*.mimes' => 'Only PDF, PNG, JPEG, DOCX, and TXT files are allowed.', // Custom error message for invalid file types
            'file.*.max' => 'Each file must not exceed 10MB.', // Custom error message for exceeding file size
        ];
    }
}