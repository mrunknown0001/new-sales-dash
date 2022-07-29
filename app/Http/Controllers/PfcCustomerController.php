<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcCustomer;
use App\Models\PfcCustomerType;
use DataTables;

class PfcCustomerController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Customer Page
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $customers = PfcCustomer::where('is_active', 1)
                            ->where('is_deleted', 0)
                            ->get(['id', 'customer_name']);

            $data = collect();
            if($customers->count() > 0) {
                foreach($customers as $c) {
                    $action = "N/A";
                    if(GC::checkModuleAccess('customer_edit', $this->farm)) {
                        $action = ' <button id="edit" data-id="' . GC::encryptString($c->id) . '" data-name="' . strtoupper($c->customer_name) . '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button> ';
                    }
                    if(GC::checkModuleAccess('customer_delete', $this->farm)) {
                        if($action == "N/A") {
                            $action = ' <button id="delete" data-name="' . strtoupper($c->customer_name) . '" data-id="' . GC::encryptString($c->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                        else {
                            $action .= ' <button id="delete" data-name="' . strtoupper($c->customer_name) . '" data-id="' . GC::encryptString($c->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                    }
                    $data->push([
                        'customer_name' => strtoupper($c->customer_name),
                        'action' => $action,
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);
        }

    	if(GC::checkModuleAccess('customer_module', $this->farm)) {
	    	return view('pfc.customer.index');
    	}

    	return abort(403);
    }


    /**
     * PFC Customer Add Page
     */
    public function add()
    {
        if(GC::checkModuleAccess('customer_add', $this->farm)) {
            $customer_types = PfcCustomerType::where('is_deleted', 0)
                                ->get(['id', 'customer_type_name']);
            return view('pfc.customer.add-edit', ['action' => 'Add', 'customer_types' => $customer_types]);
        }
        return abort(403);
    }


    /**
     * PFC Customer Edit Page
     * @param   $id Encypted ID of Customer
     */
    public function edit($id)
    {
        if(GC::checkModuleAccess('customer_add', $this->farm)) {
            $id = GC::decryptString($id);
            $customer = PfcCustomer::findorfail($id);
            $customer_types = PfcCustomerType::where('is_deleted', 0)
                                ->get(['id', 'customer_type_name']);
            return view('pfc.customer.add-edit', ['action' => 'Edit', 'customer_types' => $customer_types, 'customer' => $customer]);
        }
        return abort(403);
    }
}
