<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usersinfo;

class UserController extends Controller
{
    //
    public function index(Request $request) // Define the index method to handle user listing
    {
        $currentUser = session('user'); // Retrieve the current user from the session

        // Check if the user is not logged in or is not an admin
        if (!$currentUser || $currentUser->user_type !== 'Admin') {
            abort(403, 'Access denied'); // Deny access with a 403 error
        }

        $query = Usersinfo::query(); // Start a query on the Usersinfo model

        // Check if the 'name' filter is provided in the request
        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) { // Add a condition to filter by name
                $q->where('first_name', 'like', "%{$request->name}%") // Match first name
                  ->orWhere('last_name', 'like', "%{$request->name}%"); // Match last name
            });
        }

        // Check if the 'email' filter is provided in the request
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%"); // Add a condition to filter by email
        }

        // Paginate the results with 10 users per page and preserve query parameters
        $users = $query->paginate(10)->withQueryString();

        // Return the 'user-list' view with the users data
        return view('user-list', compact('users'));
    }


public function destroy($id) // Define the destroy method to handle user deletion
{
    $currentUser = session('user'); // Retrieve the current user from the session

    // Check if the user is not logged in or is not an admin
    if (!$currentUser || $currentUser->user_type !== 'Admin') {
        abort(403, 'Access denied'); // Deny access with a 403 error
    }

    // Prevent the current user from deleting their own account
    if ($currentUser->id == $id) {
        return back()->withErrors(['delete' => 'You cannot delete your own account.']); // Return an error message
    }

    $user = Usersinfo::find($id); // Find the user by ID

    if ($user) { // Check if the user exists
        $user->delete(); // Delete the user
        return back()->with('success', 'User deleted successfully.'); // Return a success message
    }

    // If the user is not found, return an error message
    return back()->withErrors(['delete' => 'User not found.']);
}

}
