<?php

namespace App\Http\Livewire;

use App\Models\Offer;
use App\Models\Submission;
use App\Models\User;
use Livewire\Component;

class Dataadmin extends Component


{

    public $users;
    public $submissions;
    public $offers;

    public function render()
    {

        $this->users = User::orderby('id', 'desc')->get();
        $this->submissions = Submission::orderby('id', 'desc')->get();
        $this->offers = Offer::orderby('id', 'desc')->get();
        return view('livewire.dataadmin');
    }
}
