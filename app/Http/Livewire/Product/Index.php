<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Submission;

class Index extends Component
{
    public function index()
    {

        $submissions = Submission::all();
        return view('livewire.product.index', $submissions);
    }

    public function render()
    {
        return view('livewire.product.index');
    }
}
