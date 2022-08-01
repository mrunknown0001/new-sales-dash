<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcProductType;
use App\Http\Controllers\AuditController as AC;

class PfcProductTypeAdd extends Component
{
	public $product_type_name;
	public $product_type_code;
	public $product_type_description;

	protected function rules()
	{
		return [
			'product_type_name' => 'required',
			'product_type_code' => 'required',
			'product_type_description' => 'nullable'
		];
	}

    public function render()
    {
        return view('livewire.pfc.pfc-product-type-add');
    }

    public function save()
    {
    	$this->validate();
        // Manual Pfc Product Type Validation
        $type_check = PfcProductType::where('product_type_name', $this->product_type_name)
                            ->where('is_deleted', 0)
                            ->first();

        if(isset($type_check)) {
            $this->addError('product_type_name', 'The Product Type Name already exists');
            return false;
        }

        $type_check = PfcProductType::where('product_type_code', $this->product_type_code)
                            ->where('is_deleted', 0)
                            ->first();

        if(isset($type_check)) {
            $this->addError('product_type_code', 'The Product Type Code already exists');
            return false;
        }

    	$type = new PfcProductType();
    	$type->product_type_name = $this->product_type_name;
    	$type->product_type_code = $this->product_type_code;
    	$type->product_type_description = $this->product_type_description;
    	$type->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'New',
            'pfc_product_types',
            '',
            $type,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('product-type-added', [
    		'title' => 'Product Type Added: ' . strtoupper($type->product_type_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	$this->reset();
    }
}
