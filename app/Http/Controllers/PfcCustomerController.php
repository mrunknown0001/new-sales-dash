<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class PfcCustomerController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Customer Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('customer_module', $this->farm)) {
	    	return view('pfc.customer.index');
    	}

    	return abort(403);
    }
}
