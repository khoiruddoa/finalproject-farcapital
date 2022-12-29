<?php

namespace App\Http\Livewire\Product;

use App\Models\Submission;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public function submit()
    {
        $this->validate([
            'title'      => 'required',
            'description'     => 'required',
            'category_id' => 'required',
            'price'  => 'required',
            'photo' => 'image|max:3024' // 3MB Max

        ]);

        $this->photo->store('photo', 'public');
        $submission = Submission::create([
            'user_id' => Auth::user()->id,
            'title'      => $this->title,
            'description'     => $this->description,
            'category_id' => $this->category_id,
            'price'  => $this->price,
            'location_id' => $this->location_id,
            'photo' => $this->photo->hashName()
        ]);



        if ($submission) {
            session()->flash('message', 'produk ditambahkan.');
            return redirect()->route('myproduct');
        }
    }

    public function render()
    {
        return view('livewire.product.edit', [
            "categories" => Category::all()
        ]);
    }
}
