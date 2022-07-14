<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class PfcSalesController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Sales Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('sales_module', $this->farm)) {
	    	return view('pfc.sales.index');
    	}

    	return abort(403);
    }
}
