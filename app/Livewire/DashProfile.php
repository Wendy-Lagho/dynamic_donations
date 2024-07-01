<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashProfile extends Component
{
    use Toast;

    public $userId, $name, $email, $phone, $address;

    /**
     * The mount function automatically runs when the component is initialized.
     * It's used here to set the user's initial data.
     */
    public function mount()
    {
        $this->userId = Auth::id(); // Using the Auth facade for clarity
        $user = User::find($this->userId);

        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->address = $user->address;
        } else {
            $this->error('User not found.');
        }
    }

    /**
     * Updates the user's profile information.
     */
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $user = User::find($this->userId);

        if (!$user) {
            $this->error('User not found.');
            return;
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->save();

        $this->success('User updated successfully');
    }

    /**
     * Renders the Livewire component view.
     */
    public function render()
    {
        return view('livewire.dash-profile');
    }
}