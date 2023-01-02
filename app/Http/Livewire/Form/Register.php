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
    public $password_confirm;



    public function submit()
    {
        if ($this->password == $this->password_confirm) {
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
        } else {
            Alert::warning('konfirmasi password tidak sesuai', 'Silahkan daftar kembali');

            return redirect()->route('register');
        }
    }

    public function render()
    {
        return view('livewire.form.register');
    }
}
