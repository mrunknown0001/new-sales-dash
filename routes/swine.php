<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SwineSaleController;
use App\Http\Controllers\SwineFarmController;
use App\Http\Controllers\SwineDepartmentController;
use App\Http\Controllers\SwineProductCategoryController;
use App\Http\Controllers\SwineCustomerController;
use App\Http\Controllers\SwineSaleStatusController;
use App\Http\Controllers\SwineClassificationController;

// Auth Middleware Group
Route::middleware(['auth'])->group(function() {

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


});
