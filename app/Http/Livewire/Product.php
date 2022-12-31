<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Submission;
use App\Models\Offer;

class Product extends Component
{
    public $cheapest;
    public $search;
    public $category;
    public $categories;
    protected $queryString = ['search'];


    public function render()
    {
        $this->categories = Category::all();


        $submissions = Submission::latest()->paginate(8);
        //pencarian berdasar title
        if ($this->search !== null) {
            $submissions = Submission::where('title', 'like', '%' . $this->search . '%')->latest()->paginate(8);

            //pencarian title dan termurah
            if ($this->cheapest == true) {
                $submissions = Submission::where('title', 'like', '%' . $this->search . '%')->orderBy('price', 'asc')->paginate(8);
            }
        }

        //pencarian termurah
        else if ($this->cheapest == true) {
            $submissions = Submission::orderBy('price', 'asc')->paginate(8);
        }

        //pencarin berdasar kategori
        else if ($this->category !== null) {
            $submissions = Submission::where('category_id', 'like', '%' . $this->category . '%')->latest()->paginate(8);
        }




        return view('livewire.product', [
            'submissions' => $submissions
        ]);
    }
}
