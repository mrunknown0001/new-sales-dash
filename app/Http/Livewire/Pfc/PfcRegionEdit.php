<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\ApiRegion;
use App\Http\Controllers\AuditController as AC;
use App\Http\Controllers\GeneralController as GC;

class PfcRegionEdit extends Component
{
	public ApiRegion $region;
	public $old_region;

	protected function rules()
	{
		return [
			'region.name' => 'required',
			'region.code' => 'required',
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

        // Manual Check/Validation if region if exist and active
        $current_region_code = $this->region->code;
        $region_check = ApiRegion::where('code', $this->region->code)
                            ->where('is_deleted', 0)
                            ->whereNot('id', $this->region->id)
                            ->first();

        if(isset($region_check) && strtoupper($current_region_code) == strtoupper($region_check->code) ) {
            $this->addError('region.code', 'The Region Code already exists');
            return false;
        }

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
    		'title' => 'Region Updated: ' . strtoupper($this->region->name),
    		'icon' => 'success',
    		'text' => '',
    	]);
    }
}
