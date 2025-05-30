<?php

namespace App\Http\Controllers;
use App\Notifications\RegistrationNotification;
use Illuminate\Http\Request;

// Controller for handling notifications related to registration (if used).
class RegistrationNotificationController extends Controller
{
    // Stores and manages registration notifications.
    public function store(Request $request)
    {
        
        $notification = new RegistrationNotification();
    }
}
