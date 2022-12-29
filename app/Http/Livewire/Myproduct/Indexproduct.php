<?php

namespace App\Http\Livewire\Myproduct;

use Livewire\Component;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class Indexproduct extends Component
{


    public function render()
    {
        return view('livewire.myproduct.indexproduct', [
            'submissions' => Submission::where('user_id', Auth::user()->id)->latest()->paginate(4)
        ]);
    }
}
