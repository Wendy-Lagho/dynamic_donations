<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $donations;

    public function mount()
    {
        $this->donations = Donation::with('need')
            ->orderBy('donation_date', 'desc')
            ->get();
    }

    public function approveDonation($donationId)
    {
        $donation = Donation::find($donationId);
        if ($donation) {
            $donation->admin_approved = true;
            $donation->save();
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}