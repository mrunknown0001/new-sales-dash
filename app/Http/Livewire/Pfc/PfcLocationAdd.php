<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcLocation;
use App\Models\PfcRegion;

class PfcLocationAdd extends Component
{
	public $regions;
	public $region;
	public $location_name;
	public $location_code;
	public $location_description;

	protected function rules()
	{
		return [
			'region' => 'required',
			'location_name' => 'required',
			'location_code' => 'required',
			'location_description' => 'nullable'
		];
	}

	public function mount($regions)
	{
		$this->regions = $regions;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-location-add');
    }


    public function save()
    {
    	$this->validate();
    }
}
