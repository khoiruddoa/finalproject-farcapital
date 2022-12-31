<?php

namespace App\Http\Livewire\Product;

use App\Models\Submission;
use App\Models\Category;
use App\Models\Location;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $category_id;
    public $price;
    public $location_id = 0;
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


        $location_id =  Location::where('user_id', Auth::user()->id)->first();
        if ($location_id == null) {
            Alert::error('Belum isi Alamat', 'Silahkan isi alamat di menu profile');
            return redirect()->route('myproduct');
        } else {
            $this->location_id =  $location_id->id;
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


            Alert::success('Produk Anda Sudah ditambahkan', 'Pembeli sudah kita siapkan');


            return redirect()->route('myproduct');
        }
    }

    public function render()
    {


        return view('livewire.product.create', [
            "categories" => Category::all()
        ]);
    }
}
