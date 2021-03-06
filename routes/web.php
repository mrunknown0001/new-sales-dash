<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\GeneralController;

// Fixed Route for all new application that will use Auth
Route::get('/app-login/{id}', [AuthenticationController::class, 'app_login'])->name('app.login');
// Login Route
Route::get('/login', [LoginController::class, 'login'])->name('login');
// Auth Middleware Group
Route::middleware(['auth'])->group(function() {
	// Main Session Check for Authetication
	Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
	// Dash/Dashboard
	Route::get('/', [DashboardController::class, 'dash'])->name('dash');

	Route::middleware('su')->group(function() {
        // Audit Tral
        Route::get('/audit-trail', [AuditController::class, 'trail'])->name('audits'); 
		// User Setup
		Route::get('/users', [UserController::class, 'users'])->name('users');
		Route::get('/api/users/datatables', [UserController::class, 'userJsonToDataTables'])->name('users.api.data');
		Route::get('/user/grant/{id?}/{role?}', [UserController::class, 'grantAccess'])->name('user.grant.access');
		// Access 
		Route::get('/access', [AccessController::class, 'access'])->name('access');
		Route::get('/access/{code?}', [AccessController::class, 'farmAccess'])->name('access.farm');
		Route::get('/access/set/{id?}/{fullname?}/{code?}', [AccessController::class, 'setUserAccess'])->name('access.module.set');
		Route::get('/acc/{id}/{acc}', [AccessController::class, 'acc'])->name('acc');
	});

	Route::get('/selector/{code?}', [GeneralController::class, 'selector'])->name('selector');

	// Setup
	Route::get('/setup', [SetupController::class, 'setup'])->name('setup');
});


require __DIR__.'/pfc.php';
require __DIR__.'/bdl.php';
require __DIR__.'/swine.php';