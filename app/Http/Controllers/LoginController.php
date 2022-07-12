<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\AuditController as AC;

class LoginController extends Controller
{
    public function login()
    {
        if(Auth::check()) {
            return redirect()->route('dash');
        }
        return view('login', ['message' => 'Login Using BGC Authenticator. :)']);
    }


    public function logout()
    {
        if(Auth::check()) {
            $log_entry = [
                'Logout',
                '',
                '',
                '',
            ];
            AC::logEntry($log_entry);
	    	Auth::logout();
        }
    	return view('logout');
    }
}
