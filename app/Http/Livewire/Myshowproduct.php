<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Submission;
use App\Models\Offer;

class Myshowproduct extends Component

{
    public $submission_id;

    public $submission;
    public function mount($submission_id)
    {
        $this->submission_id = $submission_id;
        $this->submission = Submission::find($submission_id);
    }

    public function render()
    {
        $offers = Offer::where('submission_id', $this->submission_id)->get();

        return view('livewire.myshowproduct', ["offers" => $offers]);
    }
}
