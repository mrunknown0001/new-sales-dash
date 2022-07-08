<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetupController extends Controller
{
    /**
     * Setup
     */
    public function setup()
    {
    	return view('setup');
    }
}
