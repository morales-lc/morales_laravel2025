<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', function () {
    return view('login'); 
})->name('login');

//login Controller
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');

Route::get('/register', function () {
    return view('registration');
})->name('register');

//REGISTRATION CONTROLLER --  TODO: MOVE TO A CONTROLLER FOR A BETTER CODE AYAW KALIMTA.

Route::post('/register', function (Request $request) {
    // not including password
    $data = $request->except('password');

    return view('registration-success', ['data' => $data]);
});


//Controller for editing name and username
Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');


//Controller for changeing password

Route::get('/edit-password', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/edit-password', [PasswordController::class, 'update'])->name('password.update');

//Controller route for display user
Route::get('/users', [UserController::class, 'index'])->name('user.list');