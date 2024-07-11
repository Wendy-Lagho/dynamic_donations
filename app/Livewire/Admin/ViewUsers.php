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
    public bool $showEditModal = false;

    public function delete($id)
    {
        User::destroy($id);
        $this->success('User deleted successfully');
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
        $user = User::find($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->save();
        $this->success('User updated successfully');
        $this->showEditModal = false;
    }

    public function closeModal()
    {
        $this->showEditModal = false;
    }
    public function render()
    {
        $users = User::paginate(10);

        return view('livewire.admin.view-users');
    }
}