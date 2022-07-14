<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class PfcProductClassificationController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Product Classification Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('product_type_module', $this->farm)) {
	    	return view('pfc.product_classification.index');
    	}

    	return abort(403);
    }
}
