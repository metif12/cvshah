<?php

namespace App\Http\Livewire\Panel;

use Livewire\Component;

class ShowDashboard extends Component
{
    public function render()
    {
        $data = [
            'demands' => auth()->user()->demands()->paginate(),
        ];
        return view('livewire.panel.show-dashboard', $data)->extends('layouts.app');
    }
}
