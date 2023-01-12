<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Setting_landing;


class Home extends Component
{
    public function render()
    { 
        $Setting_landing=Setting_landing::get();  
        return view('livewire.pages.home',compact('Setting_landing'))->layout('layouts.main');
    }
}


 