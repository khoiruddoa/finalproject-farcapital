<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Submission;
use Livewire\Component;

class CreateOffer extends Component
{



    public $offer_price;
    public $comment;

    public $submission_id = 0;
    public $submission = 0;
    public $offer = 0;
    public $cek;

    public function mount($submission_id)
    {
        $this->submission_id = $submission_id;
        $this->submission = Submission::find($submission_id);
        $this->offer = Offer::where('submission_id', $submission_id)->get();
        $this->cek = Offer::where('submission_id', $this->submission_id)->where('user_id', Auth::user()->id)->first();
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
        $submission = $this->submission;
        return view('livewire.form.create-offer', [
            'submissions' => $submission,
            'offers' => $this->offer,
            'cek' => $this->cek
        ]);
    }
}
