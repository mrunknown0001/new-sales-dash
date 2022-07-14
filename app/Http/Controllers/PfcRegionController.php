<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class PfcRegionController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Region Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('region_module', $this->farm)) {
	    	return view('pfc.region.index');
    	}

    	return abort(403);
    }
}
