<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class PfcLocationController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Location Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('location_module', $this->farm)) {
	    	return view('pfc.location.index');
    	}

    	return abort(403);
    }
}
