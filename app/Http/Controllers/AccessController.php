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
}
