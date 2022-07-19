<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcRegion;
use App\Http\Controllers\AuditController as AC;
use App\Http\Controllers\GeneralController as GC;

class PfcRegionEdit extends Component
{
	public PfcRegion $region;
	public $old_region;

	protected function rules()
	{
		return [
			'region.region_name' => 'required',
			'region.region_code' => 'required',
			'region.region_description' => 'nullable',
			'region.is_active' => 'nullable'
		];
	}

	public function mount($region)
	{
		$this->region = $region;
		$this->old_region = $region;
	}

    public function render()
    {
        return view('livewire.pfc.pfc-region-edit');
    }

    public function update()
    {
    	$this->validate();
    	$this->region->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'Update/Edit',
            'pfc_regions',
            $this->old_region,
            $this->region,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('region-updated', [
    		'title' => 'Region Updated: ' . strtoupper($this->region->region_name),
    		'icon' => 'success',
    		'text' => '',
    	]);
    }
}
