<?php

namespace App\Http\Livewire\Form;

use App\Models\Location;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CreateLocation extends Component
{

    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public $kelurahan;
    public $address;


    public function submit()
    {

        $this->validate([
            'address' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required'

        ]);

        $location = Location::create([
            'user_id' => Auth::user()->id,
            'address'      => $this->address,
            'provinsi'     => $this->provinsi,
            'kabupaten' => $this->kabupaten,
            'kecamatan'  => $this->kecamatan,
            'kelurahan'  => $this->kelurahan,
        ]);



        if ($location) {
            Alert::success('Success', 'sukses menambah alamat');
            return redirect()->route('user');
        }
    }

    public function render()
    {
        return view('livewire.form.create-location');
    }
}
