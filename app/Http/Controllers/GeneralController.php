<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Access;
use Auth;

class GeneralController extends Controller
{

    /**
     * Selector Method use to select dashboard/farm
     */
    public function selector($code = NULL)
    {
        // Set in session if not exist, if exist, destroy then set
        session()->forget('farm');
        session(['farm' => $code]);
        // Check user if has access to specific farm

        // redirect to specific route
        if($code == 'PFC') {
            return redirect()->route('pfc.dashboard');
        }
        else if($code == 'BDL') {
            return redirect()->route('bdl.dashboard');
        }else if($code == 'SWINE') {
            return redirect()->route('swine.dashboard');
        }
        else {
            return abort(404);
        }
    }


	/**
	 * Decrypt String using unified encryption key
	 * @param  string $id - any valid encrypted id 
	 * @return string $id - decrypted value of parameter
	 */
    public static function decryptString($id)
    {
		try {
			$id = Crypt::decryptString($id);
		}
		catch (\Throwable $e) {
			return abort(500);
		}

		return $id;
    }


    /**
     * Encrypt String using unified encryption key
     * @param  string $string - string 
     * @return string $str - encrypted value of parameter
     */
    public static function encryptString($string)
    {
        $str = Crypt::encryptString($string);

        return $str;
    }


    /**
     * Check User if Exists or Has access to the system
     * @param   $id User ID
     * @return   True or False
     */
    public static function checkUserAccess($id)
    {
    	$user = User::find($id);

    	if(isset($user)) {
    		return true;
    	}
    	return false;
    }


    /**
     * Return Role of the User
     * @param Int $id User ID
     * @return   Return Role of the User
     */
    public static function checkUserRole($id)
    {
        $user = User::find($id);
        if(isset($user)) {
            return strtoupper($user->role);
        }
        return "N/A";
    }






    /**
     * Get Full Name of User from Auth
     * @param Int $id User ID
     * @return   Full Name of User
     */
    public static function getUserFullName($id)
    {
        $id = Crypt::encryptString($id);
        $url = config('app.root_domain') . config('app.user_details_slug') . $id;

        $response = file_get_contents($url);
        $data = json_decode($response);

        return $data->first_name . ' ' . $data->last_name;
    }




    /**
     * Check Module Access 
     * @param   $module Module Name
     * @return   True or False if it has a access to specific module
     */
    public static function checkModuleAccess($module, $farm)
    {
        if(Auth::user()->id == 1) {
            return true;
        }

        $access = Access::where('user_id', Auth::user()->id)
                    ->where('farm', $farm)
                    ->first();

        if(empty($access) || $access == null) {
            return false;
        }

        $str = strpos($access->access, ",".$module);

        if($str === false) {
            return false;
        }
        else {
            return true;
        }
    }
}
