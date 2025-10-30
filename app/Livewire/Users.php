<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    use WithFileUploads;
    use WithPagination;

    #[Validate('required|min:3')]
    public $name;

    #[Validate('required|email:dns|unique:users,email')]
    public $email;

    #[Validate('required|min:3')]
    public $password;

    #[Validate('image|max:5120')]
    public $avatar;

    public function createNewUser()
    {
        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatars', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar']
        ]);

        $this->reset();
        session()->flash('success', 'User created successfully!');
    }

    public function render()
    {
        return view('livewire.users', [
            'title' => 'Users Page',
            'users' => User::latest()->paginate(6),
        ]);
    }
}
