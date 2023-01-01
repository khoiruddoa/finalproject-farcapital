<?php

namespace App\Http\Livewire;

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Myoffers extends Component
{

    public $myoffers;
    public function render()
    {
        $this->myoffers = Offer::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('livewire.myoffers');
    }
}
