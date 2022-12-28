<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    /**
     * login
     *
     * @return void
     */
    public function submit()
    {
        $this->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {



            session()->flash('message', 'Register Berhasil!.');
            return redirect()->route('product');
        } else {
            session()->flash('message', 'Alamat Email atau Password Anda salah!.');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.form.login');
    }
}
