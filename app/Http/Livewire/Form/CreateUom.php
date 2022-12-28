<?php

namespace App\Http\Livewire\Form;

use App\Models\Uom;
use Livewire\Component;

class CreateUom extends Component
{
    public $uom_name;


    public function submit()
    {
        $this->validate([
            'uom_name' => 'required',

        ]);

        $uom = Uom::create([
            'uom_name' => $this->uom_name

        ]);

        if ($uom) {
            session()->flash('message', 'Berhasil menambah Unit.');
            return redirect()->route('product');
        }
    }
    public function render()
    {
        return view('livewire.form.create-uom');
    }
}
