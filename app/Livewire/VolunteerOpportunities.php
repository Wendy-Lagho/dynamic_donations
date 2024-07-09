<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VolunteerActivity;

class VolunteerOpportunities extends Component
{
    public function render()
    {
        $activities = VolunteerActivity::all();

        return view('livewire.volunteer', [
            'activities' => $activities,
        ]);
    }
}
