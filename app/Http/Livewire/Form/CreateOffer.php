<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use Livewire\Component;

class CreateOffer extends Component
{



    public $offer_price;
    public $comment;

    public $submission_id = 0;

    public function mount($submission_id)
    {
        $this->submission_id = $submission_id;
    }

    public function submit()
    {

        $this->validate([
            'offer_price'      => 'required',

        ]);

        $offer = Offer::create([
            'user_id' => Auth::user()->id,
            'submission_id'      => $this->submission_id,
            'offer_price'     => $this->offer_price,
            'comment' => $this->comment,

        ]);

        if ($offer) {
            session()->flash('message', 'Penawaran Telah diajukan.');
            return redirect()->route('product');
        }
    }


    public function render()
    {
        return view('livewire.form.create-offer');
    }
}
