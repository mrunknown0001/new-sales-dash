<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Access as MAccess;


class Access extends Component
{
	public $user_id;
	public $fullname;
	public $farm;
	public array $access = [];

	protected function rules()
	{
		return [
			'access' => 'nullable',
			'farm' => 'required',
		];
	}

	public function mount($user_id, $fullname, $code)
	{
		$this->user_id = $user_id;
		$this->fullname = $fullname;
		$this->farm = $code;
	}

    public function render()
    {
        return view('livewire.access');
    }


    public function save()
    {
    	$this->validate();

    	$u_access = MAccess::where('user_id', $this->user_id)->first();

        if($u_access == null) {
            $u_access = new MAccess();
            $u_access->user_id = $this->user_id;
        }
        if($this->access == '') {
            $acc = NULL;
        }
        else {
            $acc = implode(",",$this->access);
        }
        $u_access->user_id = $this->user_id;
        $u_access->access = "," . $acc;
        $u_access->farm = $this->farm;
        $u_access->save();

    	$this->dispatchBrowserEvent('access-set', [
    		'title' => 'Access Set Successfully',
    		'icon' => 'success',
    		'text' => 'Access Set Successfully',
    	]);
    }
}
