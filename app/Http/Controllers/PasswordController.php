<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;

class PasswordController extends Controller
{
    //

    public function edit()
    {
        return view('edit-password');
    }

    public function update(Request $request)
    {
        $user = Usersinfo::find(session('user')->id);

        if (!$user || !Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }

        if ($request->new_password !== $request->confirm_password) {
            return back()->withErrors(['confirm_password' => 'New passwords do not match.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }
}
