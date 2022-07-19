<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class SwineCustomerController extends Controller
{
    private $farm = "SWINE";

    /**
     * SWINE Customer Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('customer_module', $this->farm)) {
	    	return view('swine.customer.index');
    	}

    	return abort(403);
    }
}
