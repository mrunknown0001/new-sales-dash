<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Http\Controllers\AuditController as AC;

class PfcCustomerEdit extends Component
{
	public $customer_types = array();
	public $customer_type;
	public $customer;
	public $old_data;

	protected function rules()
	{
		return [
			'customer_type' => 'required',
			'customer.customer_name' => 'required',
			'customer.customer_address' => 'required',
			'customer.customer_email' => 'required|email',
			'customer.customer_contact_number' => 'required',

		];
	}


	public function mount($customer, $customer_types)
	{
		$this->customer = $customer;
		$this->customer_types = $customer_types;
		$this->old_data = $customer;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-customer-edit');
    }


    public function update()
    {
    	$this->validate();

    	$this->customer->customer_type_id = $this->customer_type;
    	$this->customer->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'update',
            'pfc_customers',
            $this->old_data,
            $this->customer,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('customer-updated', [
    		'title' => 'Customer Updated: ' . strtoupper($this->customer->customer_name),
    		'icon' => 'success',
    		'text' => '',
    	]);
    }
}
