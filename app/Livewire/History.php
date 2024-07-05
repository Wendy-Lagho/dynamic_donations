<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Donation;

class History extends Component
{
    public $donations;

    public function mount()
    {
        if (Auth::check()) {
            // Load donations for the authenticated user, eager loading 'need' relationship
            $this->donations = Donation::where('user_id', Auth::id())
                ->with('need') // Make sure 'need' is correctly defined in Donation model as a relationship
                ->orderByDesc('donation_date')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.history', [
            'donations' => $this->donations,
        ]);
    }
}
