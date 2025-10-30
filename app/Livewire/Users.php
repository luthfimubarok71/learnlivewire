<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{

    public function createUser()
    {
        User::create([
            'name' => 'User ' . rand(1, 1000),
            'email' => 'user' . rand(1, 1000) . '@example.com',
            'password' => bcrypt('password'),
        ]);
    }

    public function render()
    {
        return view('livewire.users', [
            'title' => 'Users Page',
            'users' => User::all(),
        ]);
    }
}
