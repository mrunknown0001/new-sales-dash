<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcProduct;
use App\Models\PfcProductClassification;
use DataTables;

class PfcProductClassificationController extends Controller
{
	private $farm = 'PFC';

    /**
     * PFC Product Classification Page
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $class = PfcProductClassification::where('is_active', 1)
                            ->where('is_deleted', 0)
                            ->get(['id', 'product_classification_name', 'product_classification_code']);

            $data = collect();
            if($class->count() > 0) {
                foreach($class as $c) {
                    $action = "N/A";
                    if(GC::checkModuleAccess('product_type_edit', $this->farm)) {
                        $action = ' <button id="edit" data-id="' . GC::encryptString($c->id) . '" data-name="' . strtoupper($c->product_classification_name) . '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button> ';
                    }
                    if(GC::checkModuleAccess('product_type_delete', $this->farm)) {
                        if($action == "N/A") {
                            $action = ' <button id="delete" data-name="' . strtoupper($c->product_classification_name) . '" data-id="' . GC::encryptString($c->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                        else {
                            $action .= ' <button id="delete" data-name="' . strtoupper($c->product_classification_name) . '" data-id="' . GC::encryptString($c->id) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ';
                        }
                    }
                    $data->push([
                        'product_classification' => strtoupper($c->product_classification_name),
                        'code' => strtoupper($c->product_classification_code),
                        'action' => $action,
                    ]);
                }
            }
            return DataTables::of($data)
                    ->rawColumns(['action'])
                    ->make(true);
        }

    	if(GC::checkModuleAccess('product_classification_module', $this->farm)) {
	    	return view('pfc.product_classification.index');
    	}
    	return abort(403);
    }



    /**
     * PFC Product Classification Add Page
     */
    public function add()
    {
        if(GC::checkModuleAccess('product_classification_add', $this->farm)) {
            $products = PfcProduct::where('is_deleted', 0)
                                ->get(['id', 'product_code', 'product_name']);
            return view('pfc.product_classification.add-edit', ['action' => 'Add', 'products' => $products]);
        }
        return abort(403);
    }



    /**
     * PFC Product Classification Edit Page
     */
    public function edit($id)
    {
        if(GC::checkModuleAccess('product_classification_edit', $this->farm)) {
            $id = GC::decryptString($id);
            $class = PfcProductClassification::findorfail($id);
            $products = PfcProduct::where('is_deleted', 0)
                                ->get(['id', 'product_code', 'product_name']);
            return view('pfc.product_classification.add-edit', ['action' => 'Add', 'products' => $products, 'class' => $class]);
        }
        return abort(403);
    }
}
