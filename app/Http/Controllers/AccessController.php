<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessController extends Controller
{
    /**
     * Access
     */
    public function access()
    {
    	return view('access');
    }



    public function farmAccess($code = null)
    {
    	if($code == 'PFC') {
    		return view('access-farm', ['farm' => 'PFC']);
    	}
    	else if($code == 'BDL') {
    		return view('access-farm', ['farm' => 'BDL']);
    	}
    	else if($code == 'SWINE') {
    		return view('access-farm', ['farm' => 'SWINE']);
    	}
    	else {
    		return abort(404);
    	}
    }
}
