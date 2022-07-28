<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcEggLocation;
use App\Http\Controllers\AuditController as AC;

class PfcEggLocationEdit extends Component
{
	public $eggloc;
	public $old_value;


	protected function rules()
	{
		return [
			'eggloc.location_name' => 'required',
			'eggloc.location_code' => 'required',
			'eggloc.location_description' => 'nullable'
		];
	}

	public function mount($eggloc)
	{
		$this->eggloc = $eggloc;
		$this->old_value = $eggloc;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-egg-location-edit');
    }


    public function update()
    {
    	$this->validate();

        // Manual Validation
        $check = PfcEggLocation::where('location_code', $this->eggloc->location_code)
                            ->where('is_deleted', 0)
                            ->whereNot('id', $this->eggloc->id)
                            ->first();

        if(isset($check)) {
            $this->addError('eggloc.location_code', 'The Egg Location Code already exists');
            return false;
        }

    	$this->eggloc->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'update',
            'pfc_egg_locations',
            $this->old_value,
            $this->eggloc,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('egg-location-updated', [
    		'title' => 'Egg Location Updated: ' . strtoupper($this->eggloc->location_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    }
}
