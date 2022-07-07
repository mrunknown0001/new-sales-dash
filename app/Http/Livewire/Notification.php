<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public function render()
    {
        return view('livewire.notification');
    }

    public function notification()
    {
    	$this->dispatchBrowserEvent('notify', [
    		'title' => 'Event Title',
    		'text' => 'Event Text',
    	]);
    }
}
