<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcProductClassification;
use App\Http\Controllers\AuditController as AC;

class PfcProductClassificationAdd extends Component
{
	public $products = array();
	public $product;
	public $product_classification_name;
	public $product_classification_code;
	public $product_classification_description;

	protected function rules()
	{
		return [
			'product' => 'required',
			'product_classification_name' => 'required',
			'product_classification_code' => 'required',
			'product_classification_description' => 'nullable',
		];
	}


	public function method($products)
	{
		$this->products = $products;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-product-classification-add');
    }

    public function save()
    {
    	$this->validate();

    	// Manual Validation

    	// Save
    	$class = new PfcProductClassification();
    	$class->product_id = $this->product;
    	$class->product_classification_name = $this->product_classification_name;
    	$class->product_classification_code = $this->product_classification_code;
    	$class->product_classification_description = $this->product_classification_description;
    	$class->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'New',
            'pfc_product_categories',
            '',
            $class,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('product-classifcation-added', [
    		'title' => 'Product Classification Added: ' . strtoupper($class->product_classification_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	// Browser Event
    	$this->product_classification_name = "";
    	$this->product_classification_code = "";
    	$this->product_classification_description = "";
    }
}
