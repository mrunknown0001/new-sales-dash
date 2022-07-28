<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcLocation;

class PfcLocationAdd extends Component
{
	public $regions;
	public $regions2;
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
		$this->regions2 = $regions;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-location-add');
    }


    public function save()
    {
    	$this->validate();

        // Manual Validation
        $location_check = PfcLocation::where('location_code', $this->location_code)
                            ->where('is_deleted', 0)
                            ->first();

        if(isset($location_check)) {
            $this->addError('location_code', 'The Location Code already exists');
            return false;
        }


    	$location = new PfcLocation();
    	$location->region_id = $this->region;
    	$location->location_name = $this->location_name;
    	$location->location_code = $this->location_code;
    	$location->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'New',
            'pfc_locations',
            '',
            $location,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('location-added', [
    		'title' => 'Location Added: ' . strtoupper($location->location_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	$this->reset(['location_name', 'location_code', 'location_description']);

    	$this->region = "";
    }
}
