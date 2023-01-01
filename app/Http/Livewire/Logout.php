<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Logout extends Component
{
    use LivewireAlert;
    public function logouts()

    {
        Auth::logout();
        $this->alert('warning', ' yaaah Kok keluar?.', [
            'position' => 'center'
        ]);
        return redirect()->route('login');
    }
    public function render()
    {

        return view('livewire.logout');
    }
}
