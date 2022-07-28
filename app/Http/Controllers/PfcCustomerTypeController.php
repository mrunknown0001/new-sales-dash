<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use DataTables;
use App\Models\PfcCustomerType;

class PfcCustomerTypeController extends Controller
{
	private $farm = 'PFC';
	
    /**
     * PFC Customer Type Page
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $customer_types = PfcCustomerType::where('is_active', 1)
                            ->where('is_deleted', 0)
                            ->get(['id', 'customer_type_name']);

            $data = collect();
            if($customer_types->count() > 0) {
                foreach($customer_types as $c) {
                    $action = "N/A";
                    if(GC::checkModuleAccess('customer_type_edit', $this->farm)) {
                        $action = ' <button id="edit" data-id="' . GC::encryptString($c->id) . '" data-name="' . strtoupper($c->customer_type_name) . '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button> ';
                    }
                    if(GC::checkModuleAccess('customer_type_delete', $this->farm)) {
                        if($action == "N/A") {
                            $action = ' <button id="delete" data-name="' . strtoupper($c->customer_type_name) . '" data-id="' . GC::encryptString($c->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                        else {
                            $action .= ' <button id="delete" data-name="' . strtoupper($c->customer_type_name) . '" data-id="' . GC::encryptString($c->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                    }
                    $data->push([
                        'customer_type_name' => strtoupper($c->customer_type_name),
                        'action' => $action,
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);
        }

    	if(GC::checkModuleAccess('customer_type_module', $this->farm)) {
	    	return view('pfc.customer_type.index');
    	}

    	return abort(403);
    }




    /**
     * Customer Type Add
     */
    public function add()
    {
        if(GC::checkModuleAccess('customer_type_add', $this->farm)) {
            return view('pfc.customer_type.add-edit', ['action' => 'Add']);
        }
        return abort(403);
    }


    /**
     * Customer Type Edit
     */
    public function edit($id)
    {
        if(GC::checkModuleAccess('customer_type_edit', $this->farm)) {
            $id = GC::decryptString($id);
            $ct = PfcCustomerType::findorfail($id);
            return view('pfc.customer_type.add-edit', ['action' => 'Edit', 'type' => $ct]);
        }
        return abort(403);
    }



    /**
     * Customer Type Delete
     * @param   $id Encrypted ID of Customer Type
     */
    public function delete(Request $request)
    {
        if(GC::checkModuleAccess('location_delete', $this->farm)) {
            $id = GC::decryptString($request->id);
            $ct = PfcCustomerType::findorfail($id);
            $old_data = json_encode($ct);
            $ct->is_deleted = 1;
            if($ct->save()) {
                $log_entry = [
                    'Deleted',
                    'pfc_cusotmer_type',
                    $old_data,
                    $ct,
                ];
                AC::logEntry($log_entry);
                return true;
            }
        }
        return abort(403);
    }
}
