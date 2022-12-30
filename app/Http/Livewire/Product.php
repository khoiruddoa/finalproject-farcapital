<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Submission;
use App\Models\Offer;

class Product extends Component
{
    public $cheapest;
    public $search;
    protected $queryString = ['search'];


    public function render()
    {

        $submissions = Submission::latest()->paginate(8);
        if ($this->search !== null && $this->cheapest == true) {
            $submissions = Submission::where('title', 'like', '%' . $this->search . '%')->orderBy('price', 'asc')->paginate(8);
        } else if ($this->search !== null) {
            $submissions = Submission::where('title', 'like', '%' . $this->search . '%')
                ->latest()->paginate(8);
        } else if ($this->cheapest == true) {
            $submissions = Submission::orderBy('price', 'asc')->paginate(8);
        }

        return view('livewire.product', [
            'submissions' => $submissions
        ]);
    }
}
