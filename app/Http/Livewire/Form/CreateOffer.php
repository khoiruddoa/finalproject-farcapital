<?php

namespace App\Http\Livewire\Form;

use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Submission;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;


class CreateOffer extends Component
{



    public $offer_price;
    public $comment;

    public $submission_id = 0;
    public $submission = 0;
    public $offers = 0;
    public $cek;

    public function mount($submission_id)
    {
        $this->submission_id = $submission_id;
        $this->submission = Submission::find($submission_id);
        $this->offers = Offer::where('submission_id', $submission_id)->get();
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

        Alert::success('Penawaran sudah diajukan', 'Anda bisa menunggu jawaban');
        return redirect()->route('createOffer', ['submission_id' => $this->submission_id]);

        // session()->flash('message', 'Penawaran Telah diajukan.');
    }
    public function delete($id_offer)
    {
        Alert::question('Question Title', 'Question Message');
        offer::find($id_offer)->delete();
        Alert::info('Info Title', 'Info Message');
        return redirect()->route('createOffer', ['submission_id' => $this->submission_id]);
    }


    public function render()
    {

        return view('livewire.form.create-offer');
    }
}
