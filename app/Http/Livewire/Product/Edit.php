<?php

namespace App\Http\Livewire\Product;

use App\Models\Submission;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    use WithFileUploads;
    public $submission;
    public $submission_id;
    public $title;
    public $description;
    public $category_id;
    public $price;
    public $photo;



    public function mount($submission_id)
    {
        $submission = Submission::find($submission_id);

        $this->title = $submission->title;

        $this->category_id = $submission->category_id;
        $this->description = $submission->description;
        $this->price = $submission->price;
    }
    public function update()
    {
        $submission = Submission::find($this->submission_id);


        if ($this->photo !== null) {
            $this->photo->store('photo', 'public');
            $submission->update([
                'photo'     => $this->photo->hashName(),
                'title'      => $this->title,
                'description'     => $this->description,
                'category_id' => $this->category_id,
                'price'  => $this->price,
            ]);


            Alert::success('Yeeee', 'Produk Anda Sudah diubah');


            return redirect()->route('myproduct');
        } else {
            $submission->update([
                'title'      => $this->title,
                'description'     => $this->description,
                'category_id' => $this->category_id,
                'price'  => $this->price,
            ]);


            Alert::success('Yeeee', 'Produk Anda Sudah diubah');


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
