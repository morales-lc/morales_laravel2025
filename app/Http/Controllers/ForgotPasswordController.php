<?php

namespace App\Http\Controllers;

use App\Models\Usersinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    public function showRequestForm()
    {
        return view('forgot-password'); // Return the view for requesting a password reset
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usersinfo,email', // Validate that the email exists in the database
        ]);

        $token = Str::random(64); // Generate a random token for password reset

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email], // Match the email in the password_resets table
            ['token' => $token, 'created_at' => now()] // Insert or update the token and timestamp
        );

        $user = Usersinfo::where('email', $request->email)->first(); // Find the user by email
        $user->notify(new ResetPasswordNotification($token)); // Send the password reset notification with the token

        return back()->with('success', 'We have emailed your password reset link!'); // Redirect back with a success message
    }
}