<?php

namespace App\Http\Livewire\Form;

use App\Models\User;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Register extends Component
{
    public $name;
    public $email;
    public $telephone;
    public $password;
    public $confirm_password;



    public function submit()
    {
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required',
            'telephone' => 'required|unique:users',

        ]);

        User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'telephone' => $this->telephone,
            'password'  => bcrypt($this->password)
        ]);


        Alert::success('Registrasi berhasil', 'Silahkan masuk');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.form.register');
    }
}
