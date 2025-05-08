<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;
use App\Http\Requests\UpdatePasswordRequest;
use App\Notifications\ChangePasswordNotification;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('edit-password'); // Return the view for editing the password
    }

    public function update(UpdatePasswordRequest $request)
    {
        $user = Usersinfo::find(session('user')->id); // Find the currently logged-in user by session ID
    
        if (!$user || !Hash::check($request->old_password, $user->password)) { // Verify the old password
            return back()->withErrors(['old_password' => 'Old password is incorrect.']); // Return an error if the old password is incorrect
        }
    
        $user->password = Hash::make($request->new_password); // Hash and update the new password
        $user->save(); // Save the updated user record
        $user->notify(new ChangePasswordNotification()); // Notify the user about the password change
    
        return back()->with('success', 'Password updated successfully!'); // Redirect back with a success message
    }
}