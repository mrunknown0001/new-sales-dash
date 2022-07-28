<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Http\Controllers\AuditController as AC;
use App\Models\PfcLocation;

class PfcLocationEdit extends Component
{
	public $regions;
	public $location;
	public $old_location;
	public $region;

	protected function rules()
	{
		return [
			'region' => 'required',
			'location.location_name' => 'required',
			'location.location_code' => 'required'
		];
	}

	public function mount($regions, $location)
	{
		$this->location = $location;
		$this->old_location = $location;
		$this->regions = $regions;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-location-edit');
    }


    public function update()
    {
    	$this->validate();

        // Manual Check/Validation if region if exist and active
        $current_location_code = $this->location->location_code;
        $location_check = PfcLocation::where('location_code', $this->location->location_code)
                            ->where('is_deleted', 0)
                            ->whereNot('id', $this->location->id)
                            ->first();

        if(isset($location_check) && strtoupper($current_location_code) == strtoupper($location_check->location_code))  {
            $this->addError('location.location_code', 'The Location Code already exists');
            return false;
        }


    	$this->location->region_id = $this->region;
    	$this->location->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'Update',
            'pfc_locations',
            '',
            $this->location,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('location-updated', [
    		'title' => 'Location Updated: ' . strtoupper($this->location->location_name),
    		'icon' => 'success',
    		'text' => '',
    	]);
    }
}
