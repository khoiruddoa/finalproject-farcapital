<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Submission;

class Product extends Component
{


    public function render()
    {
        return view('livewire.product', [
            'submissions' => Submission::latest()->paginate(8)
        ]);
    }
}
