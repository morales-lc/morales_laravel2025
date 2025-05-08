<?php

namespace App\Http\Controllers; // Define the namespace for the controller

use Illuminate\Http\Request; // Import the Request class for handling HTTP requests
use App\Models\Upload; // Import the Upload model for database interactions
use Illuminate\Support\Facades\Storage; // Import the Storage facade for file storage operations
use Illuminate\Support\Str; // Import the Str helper for string operations

class UploadController extends Controller // Define the UploadController class
{
    public function create()
    {
        return view('upload'); // Return the 'upload' view for file upload form
    }

    public function store(Request $request)
    {
        foreach ($request->file('file') as $file) { // Loop through each uploaded file
            $hashedName = $file->hashName(); // Generate a hashed name for the file
            $file->storeAs('uploads', $hashedName, 'public'); // Store the file in the 'uploads' directory in the public disk

            Upload::create([ // Save file details in the database
                'original_filename' => $file->getClientOriginalName(), // Store the original file name
                'filename' => $hashedName, // Store the hashed file name
                'type' => $file->getClientMimeType(), // Store the file MIME type
                'uploaded_by' => session('user')->id, // Store the ID of the user who uploaded the file
            ]);
        }

        return redirect()->route('upload.index')->with('success', 'Files uploaded successfully.'); // Redirect to the upload index with a success message
    }

    public function index(Request $request)
    {
        $query = Upload::where('uploaded_by', session('user')->id); // Query uploads by the current user

        if ($request->filled('filename')) { // Check if a filename filter is provided
            $query->where('original_filename', 'like', '%' . $request->filename . '%'); // Filter uploads by filename
        }

        if ($request->filled('type')) { // Check if a type filter is provided
            $query->where('type', $request->type); // Filter uploads by file type
        }

        $uploads = $query->paginate(10)->withQueryString(); // Paginate the results with 10 items per page and preserve query parameters

        return view('my-uploads', compact('uploads')); // Return the 'my-uploads' view with the uploads data
    }

    public function download(Upload $upload)
    {
        if ($upload->uploaded_by !== session('user')->id) { // Check if the current user is the owner of the file
            abort(403); // Deny access with a 403 error
        }

        return Storage::disk('public')->download('uploads/' . $upload->filename, $upload->original_filename); // Download the file from the 'uploads' directory
    }

    public function destroy(Upload $upload)
    {
        if ($upload->uploaded_by !== session('user')->id) { // Check if the current user is the owner of the file
            abort(403); // Deny access with a 403 error
        }

        Storage::disk('public')->delete('uploads/' . $upload->filename); // Delete the file from the 'uploads' directory
        $upload->delete(); // Delete the file record from the database

        return back()->with('success', 'File deleted successfully.'); // Redirect back with a success message
    }
}