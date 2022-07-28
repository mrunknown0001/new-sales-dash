<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcEggLocation;
use App\Http\Controllers\AuditController as AC;

class PfcEggLocationAdd extends Component
{
	public $egg_location_name;
	public $egg_location_code;
	public $egg_location_description;

	protected function rules()
	{
		return [
			'egg_location_name' => 'required',
			'egg_location_code' => 'required',
			'egg_location_description' => 'nullable'
		];
	}

    public function render()
    {
        return view('livewire.pfc.pfc-egg-location-add');
    }


    public function save()
    {
    	$this->validate();

        // Manual Validation
        $check = PfcEggLocation::where('location_code', $this->egg_location_code)
                            ->where('is_deleted', 0)
                            ->first();

        if(isset($check)) {
            $this->addError('egg_location_code', 'The Egg Location Code already exists');
            return false;
        }

        $eggloc = new PfcEggLocation();
        $eggloc->location_name = $this->egg_location_name;
        $eggloc->location_code = $this->egg_location_code;
        $eggloc->location_description = $this->egg_location_description;
        $eggloc->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'New',
            'pfc_egg_locations',
            '',
            $eggloc,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('egg-location-added', [
    		'title' => 'Egg Location Added: ' . strtoupper($eggloc->location_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	$this->reset();
    }
}
