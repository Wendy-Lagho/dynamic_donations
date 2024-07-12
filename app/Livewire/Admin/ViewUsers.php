<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class ViewUsers extends Component
{
    use WithPagination;
    use Toast;

    public $userId;
    public $name;
    public $email;
    public $usertype;
    public $phone;
    public $address;
    public $password;
    public $password_confirmation;

    public bool $showEditModal = false;
    public bool $showCreateModal = false;

    public function delete($id)
    {
        User::destroy($id);
        $this->success('User deleted successfully');
    }

    public function create()
    {
        $this->resetFields();
        $this->showCreateModal = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'usertype' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->usertype = $this->usertype;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->password = Hash::make($this->password);

        if ($user->save()) {
            $this->showCreateModal = false;
            $this->success('User added successfully');
        } else {
            $this->error('Failed to add user');
        }
    }

    public function edit($id)
    {
        $this->userId = $id;
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->usertype = $user->usertype;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->showEditModal = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'usertype' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user = User::find($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->usertype = $this->usertype;
        $user->phone = $this->phone;
        $user->address = $this->address;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        if ($user->save()) {
            $this->showEditModal = false;
            $this->success('User updated successfully');
        } else {
            $this->error('Failed to update user');
        }
    }

    public function closeModal()
    {
        $this->showEditModal = false;
        $this->showCreateModal = false;
    }

    public function resetFields()
    {
        $this->userId = null;
        $this->name = '';
        $this->email = '';
        $this->usertype = '';
        $this->phone = '';
        $this->address = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.view-users', ['users' => $users]);
    }
}
