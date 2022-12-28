<?php

namespace App\Http\Livewire\Product;

use App\Models\Submission;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $category_id = 1;
    public $price;
    public $qty;
    public $uom_id = 1;
    public $location_id = 1;
    public $status;
    public $photo;
    public function submit()
    {

        $this->validate([
            'title'      => 'required',
            'description'     => 'required',
            'price'  => 'required',
            'qty' => 'required',
            'photo' => 'image|max:3024' // 1MB Max

        ]);

        $submission = Submission::create([
            'user_id' => Auth::user()->id,
            'title'      => $this->title,
            'description'     => $this->description,
            'category_id' => $this->category_id,
            'price'  => $this->price,
            'qty'  => $this->qty,
            'uom_id'  => $this->uom_id,
            'location_id' => $this->location_id,
            'photo' => $this->photo
        ]);
        $this->photo->store('photo');

        if ($submission) {
            session()->flash('message', 'produk ditambahkan.');
            return redirect()->route('product');
        }
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}
