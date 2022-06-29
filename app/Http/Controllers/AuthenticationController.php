<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Auth;
use App\Http\Controllers\GeneralController as GC;

class AuthenticationController extends Controller
{

    public function app_login($id = null)
    {
    	$id = GC::decryptString($id);

    	// Check user if registered to access this system
    	$user = User::whereId($id)->first();

    	if(isset($user)) {
    		
    		if(Auth::loginUsingId($user->id)) {
                // Login Success
    			return "Logged In";
    		}
    		else {
                // Login Error
    			return "Login Error [1]";
    		}
    	}
    	else {
            // No Access to the system
    		return "Login Error [2]. No Access to the System";
    	}
    }
}
