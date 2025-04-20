<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usersinfo;

class UserController extends Controller
{
    //
    public function index(Request $request)
{
    $currentUser = session('user');
    if (!$currentUser || $currentUser->user_type !== 'Admin') {
        abort(403, 'Access denied');
    }

    $query = Usersinfo::query();

    if ($request->filled('name')) {
        $query->where(function ($q) use ($request) {
            $q->where('first_name', 'like', "%{$request->name}%")
              ->orWhere('last_name', 'like', "%{$request->name}%");
        });
    }

    if ($request->filled('email')) {
        $query->where('email', 'like', "%{$request->email}%");
    }

    $users = $query->paginate(15)->withQueryString();

    return view('user-list', compact('users'));
}
}
