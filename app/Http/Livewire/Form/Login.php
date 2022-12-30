<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

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



            Alert::success('Proses masuk berhasil', 'Silahkan berbelanja');
            return redirect()->route('product');
        } else {
            Alert::warning('Password/Email salah', 'Mohon masukkan dengan benar');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.form.login');
    }
}
