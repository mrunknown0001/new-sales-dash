<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Access;
use Auth;

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
	    	return view('dash', ['code' => '', 'str' => null]);
    	}
    }


    public function pfcDashboard()
    {
        $access = Access::where('user_id', Auth::user()->id)
                    ->where('farm', 'PFC')
                    ->first();

        if(empty($access) || $access == null) {
            $str = null;
        }
        else {
            $str = substr($access->access, 1);
        }

    	return view('dash', ['code' => 'PFC', 'str' => $str]);
    }

    public function bdlDashboard()
    {
        $access = Access::where('user_id', Auth::user()->id)
                    ->where('farm', 'BDL')
                    ->first();

        if(empty($access) || $access == null) {
            $str = null;
        }
        else {
            $str = substr($access->access, 1);
        }


    	return view('dash', ['code' => 'BDL', 'str' => $str]);
    }

    public function swineDashboard()
    {
        $access = Access::where('user_id', Auth::user()->id)
                    ->where('farm', 'SWINE')
                    ->first();

        if(empty($access) || $access == null) {
            $str = null;
        }
        else {
            $str = substr($access->access, 1);
        }

    	return view('dash', ['code' => 'SWINE', 'str' => $str]);
    }
}
