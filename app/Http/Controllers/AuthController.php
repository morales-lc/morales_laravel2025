<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = Usersinfo::where('username', $request->username)->first(); // Find the user by username
    
        if ($user && Hash::check($request->password, $user->password)) { // Verify the password
            if (is_null($user->email_verified_at)) { // Check if the email is verified
                return back()->withErrors([
                    'email' => 'Please verify your email before logging in.', // Return an error if email is not verified
                ])->withInput();
            }
    
            session(['user' => $user]); // Store the user in the session
            return redirect()->route('dashboard'); // Redirect to the dashboard
        }
    
        return back()->withErrors([
            'username' => 'Invalid username or password.', // Return an error if authentication fails
        ]);
    }
    
    public function showLoginForm()
    {
        return view('login'); // Return the login view
    }

    public function verifyEmail($token)
    {
        $user = Usersinfo::where('verification_token', $token)->firstOrFail(); // Find the user by the verification token or fail
    
        $user->email_verified_at = now(); // Mark the email as verified
        $user->verification_token = null; // Clear the verification token
        $user->save(); // Save the updated user record
    
        return redirect()->route('login')->with('success', 'Email verified! You can now log in.'); // Redirect to login with success message
    }
}