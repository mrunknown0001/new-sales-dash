<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;

class PfcCustomerAdd extends Component
{
	public $customer_name;

	protected function rules()
	{
		return [
			'customer_name' => 'required',
		];
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
