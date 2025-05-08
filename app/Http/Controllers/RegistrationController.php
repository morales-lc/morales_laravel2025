<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest; // Import custom request for user registration validation
use App\Models\Usersinfo; // Import the Usersinfo model for user data
use Illuminate\Support\Str; // Import Str helper for generating UUIDs and random strings
use Illuminate\Http\Request; // Import Request class for handling HTTP requests
use Illuminate\Support\Facades\Hash; // Import Hash facade for password hashing
use App\Notifications\VerifyEmail; // Import notification for email verification

class RegistrationController extends Controller
{
    public function save(RegisterUserRequest $request)
    {
        $user = new Usersinfo; // Create a new user instance
        $user->id = \Str::uuid(); // Generate a unique UUID for the user
        $user->first_name = $request->firstname; // Assign the first name from the request
        $user->last_name = $request->lastname; // Assign the last name from the request
        $user->sex = $request->sex; // Assign the sex from the request
        $user->birthday = $request->bod; // Assign the birthday from the request
        $user->username = $request->username; // Assign the username from the request
        $user->email = $request->email; // Assign the email from the request
        $user->password = \Hash::make($request->password); // Hash and assign the password
        $user->verification_token = \Str::random(64); // Generate a random verification token
        $user->save(); // Save the user to the database

        $user->notify(new VerifyEmail($user->verification_token)); // Send email verification notification

        return view('registration-success', ['user' => $user]); // Return the registration success view
    }

    public function verifyEmail($token)
    {
        // Find the user by the verification token or fail
        $user = Usersinfo::where('verification_token', $token)->firstOrFail(); 

        $user->email_verified_at = now(); // Mark the email as verified
        $user->verification_token = null; // Clear the verification token
        $user->save(); // Save the updated user record

        return redirect()->route('login')->with('success', 'Email verified! You can now log in.'); // Redirect to login with success message
    }
}