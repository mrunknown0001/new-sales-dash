<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class PfcCustomerTypeController extends Controller
{
	private $farm = 'PFC';
	
    /**
     * PFC Customer Type Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('customer_type_module', $this->farm)) {
	    	return view('pfc.customer_type.index');
    	}

    	return abort(403);
    }
}
