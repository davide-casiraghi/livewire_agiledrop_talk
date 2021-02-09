<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;
    public $success = false;

    protected $rules = [
        'user.name' => 'min:3',
        'user.email' => 'email',
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.user-profile');
    }

    public function submit()
    {
        /*$validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        auth()->user()->update($validatedData);
        $this->success = true;*/

        $this->validate();
        $this->user->save();
        //auth()->user()->save();
        $this->success = true;
    }
}
