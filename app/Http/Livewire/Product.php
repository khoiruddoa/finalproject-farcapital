<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use App\Models\Location;
use Livewire\Component;
use App\Models\Submission;
use App\Models\Offer;

class Product extends Component
{
    public $provinsi;
    public $kabupaten;
    public $cheapest;
    public $search;
    public $category;
    public $categories;
    protected $queryString = ['search'];


    public function render()
    {
        $this->categories = Category::all();


        $submissions = Submission::where('status', 'true')->latest()->paginate(8);
        //pencarian berdasar title
        if ($this->search !== null) {
            $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(8);

            //pencarian title dan termurah
            if ($this->cheapest == true) {
                $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->orderBy('price', 'asc')->paginate(8);
            }
        }

        //pencarian termurah
        else if ($this->cheapest == true) {
            $submissions = Submission::where('status', 'true')->orderBy('price', 'asc')->paginate(8);
        }

        //pencarin berdasar kategori
        else if ($this->category !== null) {
            $submissions = Submission::where('status', 'true')->where('category_id', 'like', '%' . $this->category . '%')->latest()->paginate(8);
        }



        //pencarian berdasarkan provinsi
        if ($this->provinsi !== null) {
            $submissions = Submission::where('status', 'true')->whereHas('location', function ($q) {
                $q->where('provinsi', $this->provinsi);
            })->paginate(8);

            if ($this->kabupaten !== null) {
                $submissions = Submission::where('status', 'true')->whereHas('location', function ($q) {
                    $q->where('kabupaten', $this->kabupaten);
                })->paginate(8);
            }
        }



        return view('livewire.product', [
            'submissions' => $submissions
        ]);
    }
}
