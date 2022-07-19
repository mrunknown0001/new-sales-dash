<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class SwineProductCategoryController extends Controller
{
    private $farm = "SWINE";

    /**
     * SWINE Product Category Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('product_category_module', $this->farm)) {
	    	return view('swine.product_category.index');
    	}

    	return abort(403);
    }
}
