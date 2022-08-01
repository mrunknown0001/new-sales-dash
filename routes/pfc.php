<?php

use App\Http\Controllers\DashboardController;
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

// Auth Middleware Group
Route::middleware(['auth'])->group(function() {

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
		Route::get('/locaton/farm-add', [PfcFarmLocationController::class, 'add'])->name('pfc.farm.location.add');
		Route::get('/locaton/farm-edit/{id?}', [PfcFarmLocationController::class, 'edit'])->name('pfc.farm.location.edit');
		Route::post('/location/farm-delete', [PfcFarmLocationController::class, 'delete'])->name('pfc.farm.location.delete');
		// Egg Location
		Route::get('/location/egg', [PfcEggLocationController::class, 'index'])->name('pfc.egg.location');
		Route::get('/locaton/egg-add', [PfcEggLocationController::class, 'add'])->name('pfc.egg.location.add');
		Route::get('/locaton/egg-edit/{id?}', [PfcEggLocationController::class, 'edit'])->name('pfc.egg.location.edit');
		Route::post('/location/egg-delete', [PfcEggLocationController::class, 'delete'])->name('pfc.egg.location.delete');
		Route::get('/customer-type', [PfcCustomerTypeController::class, 'index'])->name('pfc.customer.type');
		Route::get('/customer-type-add', [PfcCustomerTypeController::class, 'add'])->name('pfc.customer.type.add');
		Route::get('/customer-type-edit/{id?}', [PfcCustomerTypeController::class, 'edit'])->name('pfc.customer.type.edit');
		Route::post('/customer-type-delete', [PfcCustomerTypeController::class, 'delete'])->name('pfc.customer.type.delete');

		Route::get('/customer', [PfcCustomerController::class, 'index'])->name('pfc.customer');
		Route::get('/customer-add', [PfcCustomerController::class, 'add'])->name('pfc.customer.add');
		Route::get('/customer-edit/{id?}', [PfcCustomerController::class, 'edit'])->name('pfc.customer.edit');
		Route::post('/customer-delete', [PfcCustomerController::class, 'delete'])->name('pfc.customer.delete');

		Route::get('/product-type', [PfcProductTypeController::class, 'index'])->name('pfc.product.type');
		Route::get('/product-type-add', [PfcProductTypeController::class, 'add'])->name('pfc.product.type.add');
		Route::get('/product-type-edit/{id?}', [PfcProductTypeController::class, 'edit'])->name('pfc.product.type.edit');
		Route::post('/product-type-delete', [PfcProductTypeController::class, 'delete'])->name('pfc.product.type.delete');

		Route::get('/product', [PfcProductController::class, 'index'])->name('pfc.product');
		Route::get('/product-add', [PfcProductController::class, 'add'])->name('pfc.product.add');
		Route::get('/product-edit/{id?}', [PfcProductController::class, 'edit'])->name('pfc.product.edit');
		Route::post('/product-delete', [PfcProductController::class, 'delete'])->name('pfc.product.delete');

		Route::get('/product-classification', [PfcProductClassificationController::class, 'index'])->name('pfc.product.classification');
		Route::get('/product-classification-add', [PfcProductClassificationController::class, 'add'])->name('pfc.product.classification.add');
		Route::get('/product-classification-edit/{id?}', [PfcProductClassificationController::class, 'edit'])->name('pfc.product.classification.edit');
		Route::get('/product-classification-delete', [PfcProductClassificationController::class, 'delete'])->name('pfc.product.classification.delete');

		Route::get('/product-quality-type', [PfcProductQualityTypeController::class, 'index'])->name('pfc.product.quality.type');
		Route::get('/product-quality-type-add', [PfcProductQualityTypeController::class, 'add'])->name('pfc.product.quality.type.add');
		Route::get('/product-quality-type-edit/{id?}', [PfcProductQualityTypeController::class, 'edit'])->name('pfc.product.quality.type.edit');
		Route::get('/product-quality-type-delete', [PfcProductQualityTypeController::class, 'delete'])->name('pfc.product.quality.type.delete');


		/** POS **/
		Route::get('/POS', [PfcPosController::class, 'index'])->name('pfc.pos');
	});

});
