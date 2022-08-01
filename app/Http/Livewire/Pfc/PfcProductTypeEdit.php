<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcProductType;
use App\Http\Controllers\AuditController as AC;

class PfcProductTypeEdit extends Component
{
	public $type;
	public $old_value;

	protected function rules()
	{
		return [
			'type.product_type_name' => 'required',
			'type.product_type_code' => 'required',
			'type.product_type_description' => 'nullable'
		];
	}

	public function mount($type)
	{
		$this->type = $type;
		$this->old_value = $type;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-product-type-edit');
    }


    public function update()
    {
    	$this->validate();

        // Manual Pfc Product Type Validation
        $type_check = PfcProductType::where('product_type_name', $this->type->product_type_name)
                            ->where('is_deleted', 0)
                            ->whereNot('id', $this->type->id)
                            ->first();

        if(isset($type_check)) {
            $this->addError('type.product_type_name', 'The Product Type Name already exists');
            return false;
        }

        $type_check = PfcProductType::where('product_type_code', $this->type->product_type_code)
                            ->where('is_deleted', 0)
                            ->whereNot('id', $this->type->id)
                            ->first();

        if(isset($type_check)) {
            $this->addError('type.product_type_code', 'The Product Type Code already exists');
            return false;
        }

        $this->type->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'update',
            'pfc_product_types',
            $this->old_value,
            $this->type,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('product-type-updated', [
    		'title' => 'Product Type Updated: ' . strtoupper($this->type->product_type_name),
    		'icon' => 'success',
    		'text' => '',
    	]);
    }
}
