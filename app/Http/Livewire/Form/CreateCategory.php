<?php

namespace App\Http\Livewire\Form;

use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;

use App\Models\Category;

class CreateCategory extends Component
{
    public $category_name;


    public function submit()
    {
        $this->validate([
            'category_name' => 'required',

        ]);

        $category = Category::create([
            'category_name' => $this->category_name

        ]);

        if ($category) {
            Alert::success('Categori Anda Sudah ditambahkan', 'Horeeee');

            return redirect()->route('dataadmin');
        }
    }
    public function render()
    {
        return view('livewire.form.create-category');
    }
}
