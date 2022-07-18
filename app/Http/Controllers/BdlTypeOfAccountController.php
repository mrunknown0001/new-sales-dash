<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class BdlTypeOfAccountController extends Controller
{
    private $farm = 'BDL';

    /**
     * BDL Type of Account Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('type_of_account_module', $this->farm)) {
	    	return view('bdl.type_of_account.index');
    	}

    	return abort(403);
    }
}
