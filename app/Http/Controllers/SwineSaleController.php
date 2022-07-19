<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class SwineSaleController extends Controller
{
    private $farm = "SWINE";

    /**
     * SWINE Sales Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('sales_module', $this->farm)) {
	    	return view('swine.sales.index');
    	}

    	return abort(403);
    }
}
