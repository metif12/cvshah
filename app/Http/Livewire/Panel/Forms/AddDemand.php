<?php

namespace App\Http\Livewire\Panel\Forms;

use App\Models\Demand;
use App\Traits\FileUpload;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddDemand extends Component
{
    use FileUpload;
    use WithFileUploads;

    public $image;

    public function getRules()
    {
        return [
            'image' => 'required|image|max:2048',
        ];
    }

    public function save()
    {
        $this->validate();

        $fileAddress = $this->upload($this->image, 'demands');

        $demand = Demand::query()
            ->create([
                'user_id' => Auth::id(),
                'is_accepted' => 1,
                'is_processed' => 0,
                'image' => $fileAddress,
            ]);

        $this->image = null;

        $this->emitSelf('saved');
    }

    public function render()
    {
        return view('livewire.panel.forms.add-demand');
    }
}
