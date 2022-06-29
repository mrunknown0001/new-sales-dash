<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;

// Fixed Route for all new application that will use Auth
Route::get('/app-login/{id}', [AuthenticationController::class, 'app_login'])->name('app.login');


Route::get('/', function () {
    return view('dash');
});


// Main Session Check for Authetication
Route::get('/logout', function () {
	Auth::logout();
	return "LOGOUT";
});
