<?php

namespace App\Http\Livewire\Form;

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
            session()->flash('message', 'Berhasil menambah kategori.');
            return redirect()->route('product');
        }
    }
    public function render()
    {
        return view('livewire.form.create-category');
    }
}
