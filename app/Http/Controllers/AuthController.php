<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;
class AuthController extends Controller
{
    //

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Find user by username
    $user = Usersinfo::where('username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Store user info in session manually
        session(['user' => $user]);

        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'username' => 'Invalid username or password.',
    ]);
}
}
