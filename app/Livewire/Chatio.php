<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Chatio extends Component
{
    /**
     * set public user variable.
     */
    public $users;

    /**
     * set mounted functions.
     */
    public function mount()
    {
        $this->users = User::orderBy('created_at', 'DESC')->take(5)->get();
    }

    /**
     * render chatio view.
     */
    public function render()
    {
        return view('livewire.chatio');
    }
}
