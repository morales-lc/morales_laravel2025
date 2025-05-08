<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Import the Request class for handling HTTP requests
use Illuminate\Support\Facades\DB; // Import the DB facade for database operations
use Illuminate\Support\Facades\Hash; // Import the Hash facade for password hashing
use App\Models\Usersinfo; // Import the Usersinfo model for user data
use App\Notifications\ResetForgottenPasswordNotification; // Import the notification for password reset

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('reset-password', ['token' => $token]); // Return the reset password form with the token
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usersinfo,email', // Validate that the email exists in the database
            'password' => 'required|min:8|confirmed', // Ensure the password meets the minimum requirements and is confirmed
            'token' => 'required' // Ensure the reset token is provided
        ]);

        $reset = DB::table('password_resets') // Query the password_resets table
            ->where('email', $request->email) // Match the email
            ->where('token', $request->token) // Match the token
            ->first(); // Retrieve the first matching record

        if (!$reset) { // Check if the reset token is invalid or expired
            return back()->withErrors(['email' => 'Invalid or expired reset token.']); // Return an error message
        }

        $user = Usersinfo::where('email', $request->email)->first(); // Find the user by email
        $user->password = Hash::make($request->password); // Hash and update the user's password
        $user->save(); // Save the updated user record

        $user->notify(new ResetForgottenPasswordNotification()); // Send a notification to the user about the password reset

        DB::table('password_resets')->where('email', $request->email)->delete(); // Delete the reset token from the database

        return redirect()->route('login')->with('success', 'Your password has been reset successfully!'); // Redirect to the login page with a success message
    }
}