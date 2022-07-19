<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class SwineDepartmentController extends Controller
{
    private $farm = "SWINE";

    /**
     * SWINE Department Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('department_module', $this->farm)) {
	    	return view('swine.department.index');
    	}

    	return abort(403);
    }
}
