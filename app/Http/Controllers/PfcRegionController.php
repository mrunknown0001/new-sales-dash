<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use DataTables;
use App\Models\PfcRegion;

class PfcRegionController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Region Page
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $region = PfcRegion::where('is_active', 1)
                            ->where('is_deleted', 0)
                            ->get();

            $data = collect();
            if($region->count() > 0) {
                foreach($region as $r) {
                    $action = "N/A";
                    if(GC::checkModuleAccess('region_edit', $this->farm)) {
                        $action = ' <button id="edit" data-id="' . GC::encryptString($r->id) . '" data-name="' . strtoupper($r->region_name) . '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button> ';
                    }
                    if(GC::checkModuleAccess('region_delete', $this->farm)) {
                        if($action == "N/A") {
                            $action = ' <button id="delete" data-name="' . strtoupper($r->region_name) . '" data-id="' . GC::encryptString($r->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                        else {
                            $action .= ' <button id="delete" data-name="' . strtoupper($r->region_name) . '" data-id="' . GC::encryptString($r->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                    }
                    $data->push([
                        'id' => $r->id,
                        'region_name' => strtoupper($r->region_name),
                        'region_code' => strtoupper($r->region_code),
                        'action' => $action,
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);
        }

        if(GC::checkModuleAccess('region_module', $this->farm)) {
            return view('pfc.region.index');
        }

    	return abort(403);
    }



    /**
     * Region Add Page
     * @return   Add Page or 403 Page
     */
    public function add()
    {
        if(GC::checkModuleAccess('region_add', $this->farm)) {
            return view('pfc.region.add-edit', ['action' => 'Add']);
        }
        return abort(403);
    }


    /**
     * Region Edit Page
     * @return   Edit Page or 403 Page
     */
    public function edit($id)
    {
        if(GC::checkModuleAccess('region_edit', $this->farm)) {
            $id = GC::decryptString($id);
            $region = PfcRegion::findorfail($id);
            return view('pfc.region.add-edit', ['action' => 'Edit', 'region' => $region]);
        }
        return abort(403);
    }


    /**
     * Region Delete Action
     */
    public function delete(Request $request)
    {
        if(GC::checkModuleAccess('region_delete', $this->farm)) {
            $id = GC::decryptString($request->id);
            $region = PfcRegion::find($id);
             $old_data = json_encode($region);
            $region->is_deleted = 1;
            if($region->save()) {
                $log_entry = [
                    'Region Deleted',
                    'pfc_regions',
                    $old_data,
                    $region,
                ];
                AC::logEntry($log_entry);
                return true;
            }
        }
        return false;
    }
}
