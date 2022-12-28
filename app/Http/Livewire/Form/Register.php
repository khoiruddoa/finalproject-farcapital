<?php

namespace App\Http\Livewire\Form;

use App\Models\User;
use Livewire\Component;

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

        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'telephone' => $this->telephone,
            'password'  => bcrypt($this->password)
        ]);

        if ($user) {
            session()->flash('message', 'Register Berhasil!.');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.form.register');
    }
}
