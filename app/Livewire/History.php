<?php

namespace App\Livewire;
use App\Models;

use Livewire\Component;
use Illuminate\Support\Facades\Auth; // Import Auth facade to get authenticated user
use App\Models\User; // Import the User model
use App\Models\Donation; // Import the Donation model

class History extends Component
{
    public $donations = []; // Initialize donations property

    public function mount()
    {
        // Fetch donations if user is authenticated
        if (Auth::check()) {
            $this->donations = Auth::user()->donations()->orderBy('donation_date', 'desc')->get();
        }
    }

    public function render()
    {
        // Pass donations data to the view
        return view('livewire.history', [
            'donations' => $this->donations,
        ]);
    }
}
