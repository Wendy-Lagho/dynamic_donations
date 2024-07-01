<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Need;
use App\Models\Donation;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard');
    }
}