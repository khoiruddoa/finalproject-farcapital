<?php

namespace App\Http\Livewire\Product;

use App\Models\Submission;
use App\Models\Category;
use App\Models\Uom;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $category_id;
    public $price;

    public $uom_id;
    public $location_id = 1;
    public $status;
    public $photo;
    public function submit()
    {
        $this->validate([
            'title'      => 'required',
            'description'     => 'required',
            'category_id' => 'required',
            'price'  => 'required',
            'photo' => 'image|max:3024' // 3MB Max

        ]);

        $submission = Submission::create([
            'user_id' => Auth::user()->id,
            'title'      => $this->title,
            'description'     => $this->description,
            'category_id' => $this->category_id,
            'price'  => $this->price,
            'location_id' => $this->location_id,
            'photo' => $this->photo->hashName()
        ]);

        $this->photo->store('photo', 'public');

        if ($submission) {
            session()->flash('message', 'produk ditambahkan.');
            return redirect()->route('product');
        }
    }

    public function render()
    {
        return view('livewire.product.create', [
            "categories" => Category::all()
        ]);
    }
}
