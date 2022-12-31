<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profil extends Component
{
    public $location =  0;
    public function render()
    {
        $this->location = Location::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        return view('livewire.profil');
    }
}
