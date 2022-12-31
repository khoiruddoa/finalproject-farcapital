<?php

namespace App\Http\Livewire;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithFileUploads;

class Changephoto extends Component
{
    use WithFileUploads;
    public $photo;
    public function render()
    {
        return view('livewire.changephoto');
    }
    public function update()
    {
        $user = User::find(Auth::user()->id);

        $this->photo->store('photo', 'public');
        $user->update([
            'photo'     => $this->photo->hashName()
        ]);
        Alert::Success('Sukses', 'Photo anda sudah diperbaharui');
        return redirect()->route('profile');
    }
}
