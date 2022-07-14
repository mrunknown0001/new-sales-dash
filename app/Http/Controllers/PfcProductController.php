<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class PfcProductController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Product Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('product_type_module', $this->farm)) {
	    	return view('pfc.product.index');
    	}

    	return abort(403);
    }
}
