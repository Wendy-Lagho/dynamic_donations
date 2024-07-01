<?php

namespace App\Livewire;
use App\Models;

use Livewire\Component;
use Illuminate\Support\Facades\Auth; // Import Auth facade to get authenticated user
use App\Models\User; // Import the User model
use App\Models\Donation; // Import the Donation model

class History extends Component
{
    public $donations; // Initialize donations property


    public function mount()
    {
        // Fetch donations if user is authenticated
        if (Auth::check()) {
            $this->donations = Auth::user()->donations() // Correct method call
                ->with('need_id') // Eager load related 'need' data
                ->where('user_id', Auth::id()) // Filter donations by the authenticated user's ID
                ->orderBy('donation_date', 'desc') // Order by donation date in descending order
                ->get(); // Execute the query and get the results
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
