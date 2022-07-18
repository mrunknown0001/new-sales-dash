<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class BdlProductTypeController extends Controller
{
    private $farm = 'BDL';

    /**
     * BDL Product Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('product_type_module', $this->farm)) {
	    	return view('bdl.product_type.index');
    	}

    	return abort(403);
    }
}
