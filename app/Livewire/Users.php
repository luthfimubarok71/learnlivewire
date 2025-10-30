<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;

class Users extends Component
{
    #[Validate('required|min:3')]
    public $name;

    #[Validate('required|email:dns|unique:users,email')]
    public $email;

    #[Validate('required|min:3')]
    public $password;

    public function createNewUser()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();
        session()->flash('success', 'User created successfully!');
    }

    public function render()
    {
        return view('livewire.users', [
            'title' => 'Users Page',
            'users' => User::all(),
        ]);
    }
}
