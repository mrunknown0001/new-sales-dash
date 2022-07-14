<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash()
    {
    	if(session()->get('farm') == 'PFC') {
    		return redirect()->route('pfc.dashboard');
    	}
    	else if(session()->get('farm') == 'BDL') {
    		return redirect()->route('bdl.dashboard');
    	}
    	else if(session()->get('farm') == 'SWINE') {
    		return redirect()->route('swine.dashboard');
    	}
    	else {
	    	return view('dash', ['code' => '']);
    	}
    }


    public function pfcDashboard()
    {
    	return view('dash', ['code' => 'PFC']);
    }

    public function bdlDashboard()
    {
    	return view('dash', ['code' => 'BDL']);
    }

    public function swineDashboard()
    {
    	return view('dash', ['code' => 'SWINE']);
    }
}
