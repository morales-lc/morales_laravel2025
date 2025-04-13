<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', function () {
    return view('login'); // Create this blade file
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $tempUsername = 'john';
    $tempPass = 'doe';

    if ($request->username === $tempUsername && $request->password === $tempPass) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login')->withErrors(['Invalid credentials']);
});


Route::get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');

Route::get('/register', function () {
    return view('registration');
})->name('register');

Route::post('/register', function (Request $request) {
    // not including password
    $data = $request->except('password');

    return view('registration-success', ['data' => $data]);
});

Route::get('/user', function (){
    return view('usersettings');
})->name('user');