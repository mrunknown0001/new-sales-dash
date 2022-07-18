<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class BdlSaleController extends Controller
{
	private $farm = 'BDL';

    /**
     * BDL Sales Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('sales_module', $this->farm)) {
	    	return view('bdl.sales.index');
    	}

    	return abort(403);
    }
}
