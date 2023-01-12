<?php

namespace App\Http\Livewire\Layout;

use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = ['refreshSidebar' => '$refresh'];

    public function render()
    {
        return view('livewire.layout.sidebar');
    }
}
