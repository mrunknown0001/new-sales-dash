<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class BdlAreaController extends Controller
{
    private $farm = 'BDL';

    /**
     * BDL Area Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('area_module', $this->farm)) {
	    	return view('bdl.area.index');
    	}

    	return abort(403);
    }
}
