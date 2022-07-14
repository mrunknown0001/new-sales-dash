<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DataTables;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use App\Models\User;
use App\Models\Access;

class AccessController extends Controller
{
    /**
     * Access
     */
    public function access()
    {
    	return view('access.access');
    }



    public function farmAccess($code = null, Request $request)
    {
        if($request->ajax()) {
            $users = User::all();

            $collect = collect();
            
            if(count($users) > 0) {
                foreach($users as $u) {
                    $name = GC::getUserFullName($u->id);
                    $collect->push([
                        'id' => $u->id,
                        'full_name' => $name,
                        'access' => $this->accessLists($u->id, $code),
                        'action' => '<button id="set-access" data-id="' . $u->id . '" data-name="' . $name . '" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Set Access</button>'
                    ]);
                }
            }
            return DataTables::of($collect)
                    ->rawColumns(['action'])
                    ->make(true);
        }

    	if($code == 'PFC') {
    		return view('access.access-farm', ['farm' => 'PFC']);
    	}
    	else if($code == 'BDL') {
    		return view('access.access-farm', ['farm' => 'BDL']);
    	}
    	else if($code == 'SWINE') {
    		return view('access.access-farm', ['farm' => 'SWINE']);
    	}
    	else {
    		return abort(404);
    	}
    }




    /**
     * checkAccess
     * @param   $id User ID, $farm Dashboard, $access Ruled Access
     * @return   true or false
     */
    public static function checkAccess($id, $farm, $acc)
    {
        $access = Access::where('user_id', 1)
                    ->where('farm', $farm)
                    ->first();

        if(empty($access) || $access == null) {
            return false;
        }

        $str = strpos($access->access, ",".$acc);

        if($str === false) {
            return false;
        }
        else {
            return true;
        }
    }


    /**
     * Set User Access to Specific Module to Specific Farm
     * @param   $id User ID, $fullname Full Name of User, $code Farm Code [SWINE, PFC, BDL]
     * @return   return LiveWire View for Setting User Access
     */
    public function setUserAccess($id, $fullname, $code)
    {
        return view('access.access-set', ['id' => $id, 'fullname' => $fullname, 'code' => $code]);
    }


    /**
     * [accessLists description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    private function accessLists($id, $farm)
    {
        $access = Access::where('user_id', $id)
                        ->where('farm', $farm)
                        ->first();

        if(empty($access) || $access == null) {
            return 'NULL';
        }

        $str = substr($access->access, 1);

        if($str == '') {
            return "NULL";
        }

        return strtoupper($str);
    }

    /**
     * Sample User Check
     * @param  Int $id  User ID
     * @param  String $acc String Module Description
     * @return String      If has or no Description
     */
    public function acc($id, $acc)
    {
        $access = Access::where('user_id', 1)
                    ->first();

        if(empty($access) || $access == null) {
            return 'no access';
        }

        $str = strpos($access->access, ",".$acc);

        if($str === false) {
            return 'no access';
        }
        else {
            return 'has access';
        }
    }
}
