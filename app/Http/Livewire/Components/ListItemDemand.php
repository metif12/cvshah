<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ListItemDemand extends Component
{
    public $demand;

    public function render()
    {
        return view('livewire.components.list-item-demand');
    }
}
