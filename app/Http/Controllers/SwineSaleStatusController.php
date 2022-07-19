<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;

class SwineSaleStatusController extends Controller
{
    private $farm = "SWINE";

    /**
     * SWINE Sale Status Page
     */
    public function index()
    {
    	if(GC::checkModuleAccess('sale_status_module', $this->farm)) {
	    	return view('swine.sale_status.index');
    	}

    	return abort(403);
    }
}
