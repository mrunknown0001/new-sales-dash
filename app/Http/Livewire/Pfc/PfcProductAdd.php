<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcProduct;

class PfcProductAdd extends Component
{
	public $product_types = array();
	public $product_type;
	public $product_name;
	public $product_code;
	public $product_description;

	protected function rules()
	{
		return [
			'product_type' => 'required',
			'product_name' => 'required',
			'product_code' => 'required',
			'product_description' => 'nullable'
		];
	}

	public function mount($product_types)
	{
		$this->product_types = $product_types;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-product-add');
    }


    public function save()
    {
    	$this->validate();

    	// Manual Validation
    	$check = PfcProduct::where('product_name', $this->product_name)
    					->where('is_deleted', 0)
    					->first();
        if(isset($check)) {
            $this->addError('product_name', 'The Product Name already exists');
            return false;
        }
    	$check = PfcProduct::where('product_code', $this->product_code)
    					->where('is_deleted', 0)
    					->first();
        if(isset($check)) {
            $this->addError('product_code', 'The Product Code already exists');
            return false;
        }

    	$product = new PfcProduct();
    	$product->product_type_id = $this->product_type;
    	$product->product_name = $this->product_name;
    	$product->product_code = $this->product_code;
    	$product->product_description = $this->product_description;
    	$product->save();

    	$this->dispatchBrowserEvent('product-added', [
    		'title' => 'Product Added: ' . strtoupper($product->product_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	$this->product_name = "";
    	$this->product_code = "";
    	$this->product_description = "";
    }
}
