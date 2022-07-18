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
use App\Http\Controllers\PfcSalesController;
use App\Http\Controllers\PfcCustomerController;
use App\Http\Controllers\PfcCustomerTypeController;
use App\Http\Controllers\PfcLocationController;
use App\Http\Controllers\PfcRegionController;
use App\Http\Controllers\PfcProductClassificationController;
use App\Http\Controllers\PfcProductController;
use App\Http\Controllers\PfcProductQualityTypeController;
use App\Http\Controllers\PfcProductTypeController;
use App\Http\Controllers\BdlSaleController;

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

	Route::group(['prefix' => 'PFC'], function() {
		Route::get('/', [DashboardController::class, 'pfcDashboard'])->name('pfc.dashboard');

		Route::get('/sales', [PfcSalesController::class, 'index'])->name('pfc.sales');

		Route::get('/region', [PfcRegionController::class, 'index'])->name('pfc.region');

		Route::get('/location', [PfcLocationController::class, 'index'])->name('pfc.location');

		Route::get('/customer-type', [PfcCustomerTypeController::class, 'index'])->name('pfc.customer.type');

		Route::get('/customer', [PfcCustomerController::class, 'index'])->name('pfc.customer');

		Route::get('/product-type', [PfcProductTypeController::class, 'index'])->name('pfc.product.type');

		Route::get('/product', [PfcProductController::class, 'index'])->name('pfc.product');

		Route::get('/product-classification', [PfcProductClassificationController::class, 'index'])->name('pfc.product.classification');

		Route::get('/product-quality-type', [PfcProductQualityTypeController::class, 'index'])->name('pfc.product.quality.type');


	});

	Route::group(['prefix' => 'BDL'], function() {
		Route::get('/', [DashboardController::class, 'bdlDashboard'])->name('bdl.dashboard');

		Route::get('/sales', [BdlSaleController::class, 'index'])->name('bdl.sales');
	});

	Route::group(['prefix' => 'SWINE'], function() {
		Route::get('/', [DashboardController::class, 'swineDashboard'])->name('swine.dashboard');
	});


	// Setup
	Route::get('/setup', [SetupController::class, 'setup'])->name('setup');
});
