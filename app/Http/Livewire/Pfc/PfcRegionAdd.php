<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\PfcRegion;
use App\Http\Controllers\AuditController as AC;

class PfcRegionAdd extends Component
{
	public $region_name;
	public $region_code;
	public $region_description;


	protected function rules()
	{
		return [
			'region_name' => 'required',
			'region_code' => 'required',
			'region_description' => 'nullable'
		];
	}

    public function render()
    {
        return view('livewire.pfc.pfc-region-add');
    }


    public function save()
    {
    	$this->validate();

    	$region = new PfcRegion();
    	$region->region_name = $this->region_name;
    	$region->region_code = $this->region_code;
    	$region->region_description = $this->region_description;
    	$region->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'New',
            'pfc_regions',
            '',
            $region,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('region-added', [
    		'title' => 'Region Added: ' . strtoupper($region->region_name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	$this->reset();

    }
}
