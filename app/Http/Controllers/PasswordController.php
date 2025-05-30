<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;
use App\Http\Requests\UpdatePasswordRequest;
use App\Notifications\ChangePasswordNotification;

// Controller for allowing users to change their password while logged in.
class PasswordController extends Controller
{
    // Shows change password form and updates the password.

    public function edit()
    {
        return view('edit-password');
    }

    public function update(UpdatePasswordRequest $request)
    {
        $user = Usersinfo::find(session('user')->id);
    
        if (!$user || !Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }
    
        $user->password = Hash::make($request->new_password);
        $user->save();
        $user->notify(new ChangePasswordNotification());
    
        return back()->with('success', 'Password updated successfully!');
    }
}
