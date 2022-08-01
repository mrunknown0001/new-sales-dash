<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcProductType;
use DataTables;

class PfcProductTypeController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Product Type Page
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $types = PfcProductType::where('is_active', 1)
                            ->where('is_deleted', 0)
                            ->get(['id', 'product_type_name']);

            $data = collect();
            if($types->count() > 0) {
                foreach($types as $type) {
                    $action = "N/A";
                    if(GC::checkModuleAccess('product_type_edit', $this->farm)) {
                        $action = ' <button id="edit" data-id="' . GC::encryptString($type->id) . '" data-name="' . strtoupper($type->product_type_name) . '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button> ';
                    }
                    if(GC::checkModuleAccess('product_type_delete', $this->farm)) {
                        if($action == "N/A") {
                            $action = ' <button id="delete" data-name="' . strtoupper($type->product_type_name) . '" data-id="' . GC::encryptString($type->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                        else {
                            $action .= ' <button id="delete" data-name="' . strtoupper($type->product_type_name) . '" data-id="' . GC::encryptString($type->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                    }
                    $data->push([
                        'product_type_name' => strtoupper($type->product_type_name),
                        'action' => $action,
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);
        }

    	if(GC::checkModuleAccess('product_type_module', $this->farm)) {
	    	return view('pfc.product_type.index');
    	}

    	return abort(403);
    }


    /**
     * PFC Product Type Add
     */
    public function add()
    {
        if(GC::checkModuleAccess('product_type_add', $this->farm)) {
            return view('pfc.product_type.add-edit', ['action' => 'Add']);
        }
        return abort(403);
    }


    /**
     * PFC Product Type Edit
     */
    public function edit($id)
    {
        if(GC::checkModuleAccess('product_type_edit', $this->farm)) {
            $id = GC::decryptString($id);
            $type = PfcProductType::findorfail($id);
            return view('pfc.product_type.add-edit', ['action' => 'Edit', 'type' => $type]);
        }
        return abort(403);
    }



    /**
     * PFC Product Type Delete
     */
    public function delete(Request $request)
    {
        if(GC::checkModuleAccess('product_type_delete', $this->farm)) {
            $id = GC::decryptString($request->id);
            $type = PfcProductType::findorfail($id);
            $old_data = json_encode($type);
            $type->is_deleted = 1;
            if($type->save()) {
                $log_entry = [
                    'Deleted',
                    'pfc_cusotmers',
                    $old_data,
                    $type,
                ];
                AC::logEntry($log_entry);
                return true;
            }
        }
        return abort(403);
    }
}
