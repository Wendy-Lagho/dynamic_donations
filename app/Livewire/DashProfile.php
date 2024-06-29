<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashProfile extends Component
{
//     public $user;
//     public $name; 

//     public function mount()
//     {
//         if (!Auth::check()) {
//             return redirect()->route('login');
//         }

//         $this->user = Auth::user();
//         if ($this->user) {
//             $this->name = $this->user->name;
//         }
//     }

//     public function updateProfile()
// {
//     if (!$this->user) {
//         session()->flash('error', 'You must be logged in to update your profile.');
//         return;
//     }

//     $this->validate([
//         'name' => ['required', 'string', 'max:255'],
//     ]);

//     try {
//         $this->user->name = $this->name;
//         $this->user->save();

//         session()->flash('message', 'Profile updated successfully.');
//     } catch (\Exception $e) {
//         session()->flash('error', 'There was a problem updating your profile.');
//     }
// }

public function render()
{
    return view('livewire.dash-profile');
}
}