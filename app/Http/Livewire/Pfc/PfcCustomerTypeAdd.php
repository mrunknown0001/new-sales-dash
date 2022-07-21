<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcCustomerType;
use App\Http\Controllers\AuditController as AC;

class PfcCustomerTypeAdd extends Component
{
	public $customer_type_name;
	public $customer_type_description;

	protected function rules()
	{
		return [
			'customer_type_name' => 'required',
			'customer_type_description' => 'nullable'
		];	
	}

    public function render()
    {
        return view('livewire.pfc.pfc-customer-type-add');
    }


    public function save()
    {
    	$this->validate();

        // Manual Validation
        $type_check = PfcCustomerType::where('customer_type_name', $this->customer_type_name)
                            ->where('is_active', 1)
                            ->first();

        if(isset($type_check)) {
            $this->addError('customer_type_name', 'The Customer Type already exists');
            return false;
        }

    	$ct = new PfcCustomerType();
    	$ct->customer_type_name = $this->customer_type_name;

    	$ct->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'New',
            'pfc_customer_types',
            '',
            $ct,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('customer-type-added', [
    		'title' => 'Customer Type Added: ' . strtoupper($ct->customer_type_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	$this->reset();
    }
}
