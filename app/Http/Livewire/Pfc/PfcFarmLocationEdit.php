<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcFarmLocation;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;

class PfcFarmLocationEdit extends Component
{
	public $farm;
	public $old_farm;

	protected function rules()
	{
		return [
			'farm.location_name' => 'required',
			'farm.location_code' => 'required',
			'farm.location_description' => 'nullable'
		];
	}

	public function mount($farm)
	{
		$this->farm = $farm;
		$this->old_farm = $farm;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-farm-location-edit');
    }


    public function update()
    {
    	$this->validate();

        // Manual Check/Validation if region if exist and active
        $current_location_code = $this->farm->location_code;
        $location_check = PfcFarmLocation::where('location_code', $this->farm->location_code)
                            ->where('is_deleted', 0)
                            ->whereNot('id', $this->farm->id)
                            ->first();

        if(isset($location_check) && strtoupper($current_location_code) == strtoupper($location_check->location_code))  {
            $this->addError('farm.location_code', 'The Farm Location Code already exists');
            return false;
        }

    	$this->farm->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'update',
            'pfc_farm_locations',
            $this->old_farm,
            $this->farm,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('farm-location-updated', [
    		'title' => 'Farm Location Updated: ' . strtoupper($this->farm->location_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    }
}
