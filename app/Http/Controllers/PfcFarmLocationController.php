<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use DataTables;
use App\Models\PfcFarmLocation;

class PfcFarmLocationController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Location Page
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $locations = PfcFarmLocation::where('is_active', 1)
                            ->where('is_deleted', 0)
                            ->get(['id', 'location_name', 'location_code']);

            $data = collect();
            if($locations->count() > 0) {
                foreach($locations as $l) {
                    $action = "N/A";
                    if(GC::checkModuleAccess('location_edit', $this->farm)) {
                        $action = ' <button id="edit" data-id="' . GC::encryptString($l->id) . '" data-name="' . strtoupper($l->location_name) . '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button> ';
                    }
                    if(GC::checkModuleAccess('location_delete', $this->farm)) {
                        if($action == "N/A") {
                            $action = ' <button id="delete" data-name="' . strtoupper($l->location_name) . '" data-id="' . GC::encryptString($l->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                        else {
                            $action .= ' <button id="delete" data-name="' . strtoupper($l->location_name) . '" data-id="' . GC::encryptString($l->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                    }
                    $data->push([
                        'location_name' => strtoupper($l->location_name),
                        'location_code' => strtoupper($l->location_code),
                        'action' => $action,
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);
        }

    	if(GC::checkModuleAccess('location_module', $this->farm)) {
	    	return view('pfc.farm_location.index');
    	}

    	return abort(403);
    }


    /**
     * Farm Location Add
     * @return   View for Adding Farm Location
     */
    public function add()
    {
        if(GC::checkModuleAccess('location_add', $this->farm)) {
            return view('pfc.farm_location.add-edit', ['action' => 'Add']);
        }
        return abort(403);
    }


    /**
     * Farm Location Edit
     * @param   $id Encrypted ID of Farm Location
     */
    public function edit($id)
    {
        if(GC::checkModuleAccess('location_edit', $this->farm)) {
            $id = GC::decryptString($id);
            $farm = PfcFarmLocation::findorfail($id);
            return view('pfc.farm_location.add-edit', ['action' => 'Edit', 'farm' => $farm]);
        }
        return abort(403);
    }



    /**
     * Farm Location Delete
     * @param   $id Encrypted ID of Farm Location
     */
    public function delete(Request $request)
    {
        if(GC::checkModuleAccess('location_delete', $this->farm)) {
            $id = GC::decryptString($request->id);
            $farm = PfcFarmLocation::findorfail($id);
            $old_data = json_encode($farm);
            $farm->is_deleted = 1;
            if($farm->save()) {
                $log_entry = [
                    'Location Deleted',
                    'pfc_locations',
                    $old_data,
                    $farm,
                ];
                AC::logEntry($log_entry);
                return true;
            }
        }
        return abort(403);
    }
}
