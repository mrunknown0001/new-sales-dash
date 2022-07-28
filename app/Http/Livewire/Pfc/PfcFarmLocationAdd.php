<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcFarmLocation;
use App\Http\Controllers\GeneralController as GC;
use App\Http\Controllers\AuditController as AC;

class PfcFarmLocationAdd extends Component
{
	public $farm_location_name;
	public $farm_location_code;
	public $farm_location_description;	

	protected function rules()
	{
		return [
			'farm_location_name' => 'required',
			'farm_location_code' => 'required',
			'farm_location_description' => 'nullable'
		];
	}

    public function render()
    {
        return view('livewire.pfc.pfc-farm-location-add');
    }


    public function save()
    {
    	$this->validate();

        // Manual Validation
        $check = PfcFarmLocation::where('location_code', $this->farm_location_code)
                            ->where('is_deleted', 0)
                            ->first();

        if(isset($check)) {
            $this->addError('farm_location_code', 'The Farm Location Code already exists');
            return false;
        }

        $farmloc = new PfcFarmLocation();
        $farmloc->location_name = $this->farm_location_name;
        $farmloc->location_code = $this->farm_location_code;
        $farmloc->location_description = $this->farm_location_description;
        $farmloc->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'New',
            'pfc_farm_locations',
            '',
            $farmloc,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('farm-location-added', [
    		'title' => 'Farm Location Added: ' . strtoupper($farmloc->location_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	$this->reset();
    }
}
