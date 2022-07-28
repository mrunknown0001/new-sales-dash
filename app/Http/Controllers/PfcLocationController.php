<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use DataTables;
use App\Models\PfcLocation;
use App\Models\PfcRegion;
use App\Models\ApiRegion;

class PfcLocationController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Location Page
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $locations = PfcLocation::where('is_active', 1)
                            ->where('is_deleted', 0)
                            ->get(['id', 'region_id', 'location_name', 'location_code']);

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
                        'region' => $l->region->name,
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
	    	return view('pfc.location.index');
    	}

    	return abort(403);
    }



     /**
     * Region Add Page
     * @return   Add Page or 403 Page
     */
    public function add()
    {
        if(GC::checkModuleAccess('location_add', $this->farm)) {
            $region = ApiRegion::get(['id', 'name', 'code']);
            return view('pfc.location.add-edit', ['action' => 'Add', 'regions' => $region]);
        }
        return abort(403);
    }


    /**
     * Region Edit Page
     * @return   Edit Page or 403 Page
     */
    public function edit($id)
    {
        if(GC::checkModuleAccess('location_edit', $this->farm)) {
            $id = GC::decryptString($id);
            $location = PfcLocation::findorfail($id);
            $region = ApiRegion::get(['id', 'name', 'code']);
            return view('pfc.location.add-edit', ['action' => 'Edit', 'location' => $location, 'regions' => $region]);
        }
        return abort(403);
    }


    /**
     * Region Delete Action
     */
    public function delete(Request $request)
    {
        if(GC::checkModuleAccess('location_delete', $this->farm)) {
            $id = GC::decryptString($request->id);
            $location = PfcLocation::find($id);
            $old_data = json_encode($location);
            $location->is_deleted = 1;
            if($location->save()) {
                $log_entry = [
                    'Location Deleted',
                    'pfc_farm_locations',
                    $old_data,
                    $location,
                ];
                AC::logEntry($log_entry);
                return true;
            }
        }
        return false;
    }   
}
