<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usersinfo;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('edit-profile'); // Return the view for editing the profile
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Usersinfo::find(session('user')->id); // Find the currently logged-in user by session ID

        if ($user) { // Check if the user exists
            $user->first_name = $request->first_name; // Update the first name
            $user->last_name = $request->last_name; // Update the last name
            $user->username = $request->username; // Update the username
            $user->save(); // Save the updated user information
    
            session(['user' => $user]); // Update the session with the new user data
    
            return back()->with('success', 'Profile updated successfully!'); // Redirect back with a success message
        }
    
        return back()->withErrors(['user' => 'User not found.']); // Return an error if the user is not found
    }
}

