<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;

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

    	// save

    	// fire event

    	// clear form
    	$this->reset();
    }
}
