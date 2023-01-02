<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\Submission;
use App\Models\Offer;
use RealRashid\SweetAlert\Facades\Alert;

class Myshowproduct extends Component

{
    use LivewireAlert;
    public $offers;
    public $offer_id;
    public $submission_id;
    public $high;
    public $submission;
    public function mount($submission_id)
    {
        $this->submission_id = $submission_id;
        $this->submission = Submission::find($submission_id);
    }


    public function update($offer_id)
    {

        $offer = Offer::find($offer_id);
        $submission = Submission::find($this->submission_id);

        $submission->update(['status' => false]);
        $offer->update([
            'status'     => true
        ]);
        $this->alert('success', 'pembeli sudah dipilih!', [
            'position' => 'center'
        ]);
    }


    public function destroy($submission_id)
    {

        if ($this->offers->count()) {
            $this->alert('warning', ' Produkmu tidak bisa dihapus. karena sudah ada penawar.', [
                'position' => 'center'
            ]);
        } else {
            $submission = Submission::find($submission_id);

            if ($submission) {
                $submission->delete();
            }


            Alert::warning('hmmmmmmm', 'Produk Anda Sudah dihapus');
            return redirect()->route('myproduct');
        }
    }
    public function render()
    {


        $this->offers = Offer::where('submission_id', $this->submission_id)->orderBy('offer_price', 'desc')->get();

        return view('livewire.myshowproduct');
    }
}
