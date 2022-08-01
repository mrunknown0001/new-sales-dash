<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcProductType;
use App\Models\PfcProduct;
use DataTables;

class PfcProductController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Product Page
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $products = PfcProduct::where('is_active', 1)
                            ->where('is_deleted', 0)
                            ->get(['id', 'product_type_id', 'product_name', 'product_code']);

            $data = collect();
            if($products->count() > 0) {
                foreach($products as $p) {
                    $action = "N/A";
                    if(GC::checkModuleAccess('product_edit', $this->farm)) {
                        $action = ' <button id="edit" data-id="' . GC::encryptString($p->id) . '" data-name="' . strtoupper($p->product_name) . '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button> ';
                    }
                    if(GC::checkModuleAccess('product_delete', $this->farm)) {
                        if($action == "N/A") {
                            $action = ' <button id="delete" data-name="' . strtoupper($p->product_name) . '" data-id="' . GC::encryptString($p->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                        else {
                            $action .= ' <button id="delete" data-name="' . strtoupper($p->product_name) . '" data-id="' . GC::encryptString($p->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                    }
                    $data->push([
                        'product_type' => strtoupper($p->product_type->product_type_name),
                        'product_name' => strtoupper($p->product_name),
                        'product_code' => strtoupper($p->product_code),
                        'action' => $action,
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);
        }
    	if(GC::checkModuleAccess('product_module', $this->farm)) {
	    	return view('pfc.product.index');
    	}

    	return abort(403);
    }



    /**
     * PFC Product Add
     */
    public function add()
    {
        if(GC::checkModuleAccess('product_add', $this->farm)) {
            $types = PfcProductType::where('is_deleted', 0)
                        ->get(['id', 'product_type_name', 'product_type_code']);
            return view('pfc.product.add-edit', ['action' => 'Add', 'product_types' => $types]);
        }
        return abort(403);
    }



    /**
     * PFC Product Edit
     */
    public function edit($id)
    {
        if(GC::checkModuleAccess('product_edit', $this->farm)) {
            $id = GC::decryptString($id);
            $product = PfcProduct::findorfail($id);
            $types = PfcProductType::where('is_deleted', 0)
                        ->get(['id', 'product_type_name', 'product_type_code']);
            return view('pfc.product.add-edit', ['action' => 'Edit', 'product_types' => $types, 'product' => $product]);
        }
        return abort(403);
    }


    /**
     * PFC Product Delete
     */
    public function delete(Request $request)
    {
        if(GC::checkModuleAccess('product_delete', $this->farm)) {
            $id = GC::decryptString($request->id);
            $product = PfcProduct::find($id);
            $old_data = json_encode($product);
            $product->is_deleted = 1;
            if($product->save()) {
                $log_entry = [
                    'Location Deleted',
                    'pfc_farm_locations',
                    $old_data,
                    $product,
                ];
                AC::logEntry($log_entry);
                return true;
            }
        }
        return false;
    }
}
