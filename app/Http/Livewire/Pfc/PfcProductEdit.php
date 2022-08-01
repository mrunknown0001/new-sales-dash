<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcProduct;

class PfcProductEdit extends Component
{
	public $product_types = array();
	public $product;
	public $old_value;
	public $product_type;

	protected function rules()
	{
		return [
			'product_type' => 'required',
			'product.product_name' => 'required',
			'product.product_code' => 'required',
			'product.product_description' => 'nullable'
		];
	}

	public function mount($product_types, $product)
	{
		$this->product_types = $product_types;
		$this->product = $product;
		$this->old_value = $product;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-product-edit');
    }

    public function update()
    {
    	$this->validate();

    	// Manual Validation
    	$check = PfcProduct::where('product_name', $this->product->product_name)
    					->where('is_deleted', 0)
    					->whereNot('id', $this->product->id)
    					->first();
        if(isset($check)) {
            $this->addError('product_name', 'The Product Name already exists');
            return false;
        }
    	$check = PfcProduct::where('product_code', $this->product->product_code)
    					->where('is_deleted', 0)
    					->whereNot('id', $this->product->id)
    					->first();
        if(isset($check)) {
            $this->addError('product_code', 'The Product Code already exists');
            return false;
        }

    	$this->product->product_type_id = $this->product_type;
    	$this->product->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'Update',
            'pfc_products',
            $this->old_value,
            $this->product,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('product-updated', [
    		'title' => 'Product Updated: ' . strtoupper($this->product->product_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    }
}
