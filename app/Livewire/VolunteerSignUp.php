<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VolunteerActivity;
use Illuminate\Support\Facades\Validator;

class VolunteerSignUp extends Component
{
    public $name;
    public $email;
    public $activityId;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'activityId' => 'required|exists:volunteer_activities,id',
    ];

    public function render()
    {
        return view('livewire.volunteer-sign-up');
    }

    public function showSignUpModal($activityId)
    {
        $this->resetValidation();
        $this->activityId = $activityId;
        $this->showModal = true;
    }

    public function submitSignUp()
    {
        $validatedData = $this->validate();

        // Store volunteer sign-up in the database
        VolunteerActivity::find($this->activityId)->volunteers()->create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->reset(['name', 'email', 'showModal']);
        
        session()->flash('message', 'Thank you for signing up as a volunteer!');
    }
}
