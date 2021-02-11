<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;
    public $success = false;

    protected $rules = [
        'user.name' => ['required', 'min:3'],
        'user.email' => ['required', 'email'],
    ];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user-profile');
    }

    public function submit()
    {
        $this->validate();
        $this->user->save();
        $this->success = true;
    }
}
