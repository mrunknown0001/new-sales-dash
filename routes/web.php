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
use App\Http\Controllers\PfcFarmLocationController;
use App\Http\Controllers\PfcEggLocationController;
use App\Http\Controllers\PfcRegionController;
use App\Http\Controllers\PfcProductClassificationController;
use App\Http\Controllers\PfcProductController;
use App\Http\Controllers\PfcProductQualityTypeController;
use App\Http\Controllers\PfcProductTypeController;
use App\Http\Controllers\BdlSaleController;
use App\Http\Controllers\BdlAreaController;
use App\Http\Controllers\BdlTypeOfTechVisitController;
use App\Http\Controllers\BdlCustomerController;
use App\Http\Controllers\BdlTypeOfAccountController;
use App\Http\Controllers\BdlProductController;
use App\Http\Controllers\BdlProductTypeController;
use App\Http\Controllers\BdlBreedController;
use App\Http\Controllers\SwineSaleController;
use App\Http\Controllers\SwineFarmController;
use App\Http\Controllers\SwineDepartmentController;
use App\Http\Controllers\SwineProductCategoryController;
use App\Http\Controllers\SwineCustomerController;
use App\Http\Controllers\SwineSaleStatusController;
use App\Http\Controllers\SwineClassificationController;

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
		Route::get('/region-add', [PfcRegionController::class, 'add'])->name('pfc.region.add');
		Route::get('/region-edit/{id?}', [PfcRegionController::class, 'edit'])->name('pfc.region.edit');
		Route::post('/region-delete', [PfcRegionController::class, 'delete'])->name('pfc.region.delete');

		Route::get('/location', [PfcLocationController::class, 'index'])->name('pfc.location');
		Route::get('/location-add', [PfcLocationController::class, 'add'])->name('pfc.location.add');
		Route::get('/location-edit/{id?}', [PfcLocationController::class, 'edit'])->name('pfc.location.edit');
		Route::post('/location-delete', [PfcLocationController::class, 'delete'])->name('pfc.location.delete');
		// Farm Location
		Route::get('/location/farm', [PfcFarmLocationController::class, 'index'])->name('pfc.farm.location');
		// Egg Location
		Route::get('/location/egg', [PfcEggLocationController::class, 'index'])->name('pfc.egg.location');

		Route::get('/customer-type', [PfcCustomerTypeController::class, 'index'])->name('pfc.customer.type');
		Route::get('/customer-type-add', [PfcCustomerTypeController::class, 'add'])->name('pfc.customer.type.add');
		Route::get('/customer-type-edit/{id?}', [PfcCustomerTypeController::class, 'edit'])->name('pfc.customer.type.edit');
		Route::post('/customer-type-delete', [PfcCustomerTypeController::class, 'delete'])->name('pfc.customer.type.delete');

		Route::get('/customer', [PfcCustomerController::class, 'index'])->name('pfc.customer');

		Route::get('/product-type', [PfcProductTypeController::class, 'index'])->name('pfc.product.type');

		Route::get('/product', [PfcProductController::class, 'index'])->name('pfc.product');

		Route::get('/product-classification', [PfcProductClassificationController::class, 'index'])->name('pfc.product.classification');

		Route::get('/product-quality-type', [PfcProductQualityTypeController::class, 'index'])->name('pfc.product.quality.type');


	});

	Route::group(['prefix' => 'BDL'], function() {
		Route::get('/', [DashboardController::class, 'bdlDashboard'])->name('bdl.dashboard');

		Route::get('/sales', [BdlSaleController::class, 'index'])->name('bdl.sales');

		Route::get('/area', [BdlAreaController::class, 'index'])->name('bdl.area');

		Route::get('/type-of-tech-visit', [BdlTypeOfTechVisitController::class, 'index'])->name('bdl.type.of.tech.visit');

		Route::get('/customer', [BdlCustomerController::class, 'index'])->name('bdl.customer');

		Route::get('/type-of-account', [BdlTypeOfAccountController::class, 'index'])->name('bdl.type.of.account');

		Route::get('/product', [BdlProductController::class, 'index'])->name('bdl.product');

		Route::get('/product-type', [BdlProductTypeController::class, 'index'])->name('bdl.product.type');

		Route::get('/breed', [BdlBreedController::class, 'index'])->name('bdl.breed');
	});

	Route::group(['prefix' => 'SWINE'], function() {
		Route::get('/', [DashboardController::class, 'swineDashboard'])->name('swine.dashboard');

		Route::get('/sales', [SwineSaleController::class, 'index'])->name('swine.sales');

		Route::get('/farm', [SwineFarmController::class, 'index'])->name('swine.farm');

		Route::get('/department', [SwineDepartmentController::class, 'index'])->name('swine.department');

		Route::get('/product-category', [SwineProductCategoryController::class, 'index'])->name('swine.product.category');

		Route::get('/customer', [SwineCustomerController::class, 'index'])->name('swine.customer');

		Route::get('/sale-status', [SwineSaleStatusController::class, 'index'])->name('swine.sale.status');

		Route::get('/classification', [SwineClassificationController::class, 'index'])->name('swine.classification');
	});


	// Setup
	Route::get('/setup', [SetupController::class, 'setup'])->name('setup');
});
