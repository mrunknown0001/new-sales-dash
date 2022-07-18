<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class BdlTypeOfTechVisitController extends Controller
{
    private $farm = 'BDL';

    /**
     * BDL Type of Tech Visit Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('type_of_tech_visit_module', $this->farm)) {
	    	return view('bdl.type_of_tech_visit.index');
    	}

    	return abort(403);
    }
}
