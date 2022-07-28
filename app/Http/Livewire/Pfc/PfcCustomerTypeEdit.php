<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcCustomerType;
use App\Http\Controllers\AuditController as AC;

class PfcCustomerTypeEdit extends Component
{
	public $customer_type;
	public $old_value;

	protected function rules()
	{
		return [
			'customer_type.customer_type_name' => 'required',
			'customer_type.customer_type_description' => 'nullable'
		];
	}

	public function mount($type)
	{
		$this->customer_type = $type;
		$this->old_value = $type;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-customer-type-edit');
    }

    public function update()
    {
    	$this->validate();

        $current_ctn = $this->customer_type->customer_type_name;
        $customer_type_check = PfcCustomerType::where('customer_type_name', $this->customer_type->customer_type_name)
                            ->where('is_deleted', 0)
                            ->whereNot('id', $this->customer_type->id)
                            ->first();

        if(isset($customer_type_check) && strtoupper($current_ctn) == strtoupper($customer_type_check->customer_type_name) ) {
            $this->addError('customer_type.customer_type_name', 'The Customer Type already exists');
            return false;
        }

    	$this->customer_type->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'Update',
            'pfc_customer_types',
            $this->old_value,
            $this->customer_type,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('customer-type-updated', [
    		'title' => 'Customer Type Updated: ' . strtoupper($this->customer_type->customer_type_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    }
}
