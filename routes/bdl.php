<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BdlSaleController;
use App\Http\Controllers\BdlAreaController;
use App\Http\Controllers\BdlTypeOfTechVisitController;
use App\Http\Controllers\BdlCustomerController;
use App\Http\Controllers\BdlTypeOfAccountController;
use App\Http\Controllers\BdlProductController;
use App\Http\Controllers\BdlProductTypeController;
use App\Http\Controllers\BdlBreedController;

// Auth Middleware Group
Route::middleware(['auth'])->group(function() {

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

});
