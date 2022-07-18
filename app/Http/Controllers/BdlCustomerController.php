<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class BdlCustomerController extends Controller
{
    private $farm = 'BDL';

    /**
     * BDL Customer Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('customer_module', $this->farm)) {
	    	return view('bdl.customer.index');
    	}

    	return abort(403);
    }
}
