<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class ViewUsers extends Component
{
    use WithPagination;

    public $name, $email, $password, $usertype = 'user', $phone, $address;
    public $confirmingUserDeletion = false;
    public $userIdBeingDeleted;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'usertype' => 'required|string',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
    ];

    public function render()
    {
        $users = User::paginate(10);

        return view('livewire.admin.view-users', [
            'users' => $users
        ]);
    }

    public function addUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'usertype' => $this->usertype,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        $this->reset(['name', 'email', 'password', 'usertype', 'phone', 'address']);

        session()->flash('message', 'User added successfully.');
    }

    public function confirmUserDeletion($userId)
    {
        $this->confirmingUserDeletion = true;
        $this->userIdBeingDeleted = $userId;
    }

    public function deleteUser()
    {
        User::findOrFail($this->userIdBeingDeleted)->delete();
        $this->confirmingUserDeletion = false;
        $this->userIdBeingDeleted = null;

        session()->flash('message', 'User deleted successfully.');
    }
}