<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class Notifications extends Component
{
    public function render()
    {
        return view('livewire.notifications');
    }
}
