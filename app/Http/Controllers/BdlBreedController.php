<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class BdlBreedController extends Controller
{
    private $farm = 'BDL';

    /**
     * BDL Product Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('breed_module', $this->farm)) {
	    	return view('bdl.breed.index');
    	}

    	return abort(403);
    }
}
