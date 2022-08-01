<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcCustomer;
use App\Notifications\SendNotification;

class PfcCustomerAdd extends Component
{
	public $customer_name;
    public $customer_types = array();
	public $customer_type;
	public $customer_address;
	public $customer_email;
	public $customer_contact_number;

	protected function rules()
	{
		return [
			'customer_type' => 'required',
			'customer_name' => 'required',
			'customer_address' => 'required',
			'customer_email' => 'required|email',
			'customer_contact_number' => 'required',

		];
	}

	public function mount($customer_types)
	{
        $this->customer_types = $customer_types;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-customer-add');
    }


    public function save()
    {
    	$this->validate();

    	// Manual Validation
    	$check = PfcCustomer::where('customer_name', $this->customer_name)
    					->where('is_deleted', 0)
    					->first();
        if(isset($check)) {
            $this->addError('customer_name', 'The Customer Name already exists');
            return false;
        }

    	// save
    	$customer = new PfcCustomer();
    	$customer->customer_type_id = $this->customer_type;
    	$customer->customer_name = $this->customer_name;
    	$customer->customer_address = $this->customer_address;
    	$customer->customer_email = $this->customer_email;
    	$customer->customer_contact_number = $this->customer_contact_number;
    	$customer->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'New',
            'pfc_customers',
            '',
            $customer,
        ];
        AC::logEntry($log_entry);
        $user = \App\Models\User::find(1);
        $user->notify(new SendNotification($customer));

    	$this->dispatchBrowserEvent('customer-added', [
    		'title' => 'Customer Added: ' . strtoupper($customer->customer_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	// clear form
        $this->customer_name = "";
        $this->customer_address = "";
        $this->customer_email = "";
        $this->customer_contact_number = "";
    }
}
