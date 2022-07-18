<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class BdlProductController extends Controller
{
    private $farm = 'BDL';

    /**
     * BDL Product Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('product_module', $this->farm)) {
	    	return view('bdl.product.index');
    	}

    	return abort(403);
    }
}
