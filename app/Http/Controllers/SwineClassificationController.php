<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class SwineClassificationController extends Controller
{
    private $farm = "SWINE";

    /**
     * SWINE Classification Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('classification_module', $this->farm)) {
	    	return view('swine.classification.index');
    	}

    	return abort(403);
    }
}
