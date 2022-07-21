<?php

namespace App\Http\Livewire\Pfc;

use Livewire\Component;
use App\Models\ApiRegion;
use App\Http\Controllers\AuditController as AC;

class PfcRegionAdd extends Component
{
	public $name;
	public $code;


	protected function rules()
	{
		return [
			'name' => 'required',
			'code' => 'required',
		];
	}

    public function render()
    {
        return view('livewire.pfc.pfc-region-add');
    }


    public function save()
    {
    	$this->validate();

        // Manual Check/Validation if region if exist and active
        $region_check = ApiRegion::where('code', $this->code)
                            ->where('is_active', 1)
                            ->first();

        if(isset($region_check)) {
            $this->addError('code', 'The Region Code already exists');
            return false;
        }

    	$region = new ApiRegion();
    	$region->name = $this->name;
    	$region->code = $this->code;
    	$region->save();

        // [action, table, old_value, new_value]
        $log_entry = [
            'New',
            'api_regions',
            '',
            $region,
        ];
        AC::logEntry($log_entry);

    	$this->dispatchBrowserEvent('region-added', [
    		'title' => 'Region Added: ' . strtoupper($region->name),
    		'icon' => 'success',
    		'text' => '',
    	]);

    	$this->reset();

    }
}
