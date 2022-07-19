<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class SwineFarmController extends Controller
{
    private $farm = "SWINE";

    /**
     * SWINE Farm Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('farm_module', $this->farm)) {
	    	return view('swine.farm.index');
    	}

    	return abort(403);
    }
}
