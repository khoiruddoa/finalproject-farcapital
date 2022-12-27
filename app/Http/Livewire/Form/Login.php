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

            session()->regenerate();
            return redirect()->intended(route('product'));
        } else {
            session()->flash('message', 'Alamat Email atau Password Anda salah!.');
            return redirect()->route('auth.login');
        }
    }

    public function render()
    {
        return view('livewire.form.login');
    }
}
