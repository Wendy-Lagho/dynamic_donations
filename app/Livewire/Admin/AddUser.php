<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Mary\Traits\Toast;

class AddUser extends Component
{
    use Toast;
    public $name;
    public $email;
    public $usertype;
    public $phone;
    public $address;
    public $password;
    public $password_confirmation;

    public function save(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'usertype' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'usertype' => $this->usertype,
            'phone' => $this->phone,
            'address' => $this->address,
            'password' => bcrypt($this->password),
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->usertype = $this->usertype;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->password = bcrypt($this->password);
        $user->save();
        $this->success('User added successfully',);
        $this->name = '';
        $this->email = '';
        $this->usertype = '';
        $this->phone = '';
        $this->address = '';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.admin.add-user');
    }
}
