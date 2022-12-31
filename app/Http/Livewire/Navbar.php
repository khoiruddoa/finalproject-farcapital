<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Navbar extends Component
{

    public $user;
    public function render()
    {

        return view('livewire.navbar');
    }
}
