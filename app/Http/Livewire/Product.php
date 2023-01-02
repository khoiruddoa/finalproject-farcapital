<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use App\Models\Location;
use Livewire\Component;
use App\Models\Submission;
use App\Models\Offer;

class Product extends Component
{
    use WithPagination;
    public $provinsi;
    public $kabupaten;
    public $cheapest;
    public $search;
    public $category;
    public $categories;
    protected $queryString = ['search'];


    public function render()
    {
        $this->categories = Category::all();


        $submissions = Submission::where('status', 'true')->latest()->paginate(4);

        //pencarian berdasar title
        if ($this->search !== null && $this->cheapest == null && $this->category == null) {
            $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(4);
        }


        //pencarian termurah
        else if ($this->cheapest == true && $this->category == null && $this->search == null) {
            $submissions = Submission::where('status', 'true')->orderBy('price', 'asc')->paginate(4);
        }

        //pencarian berdasar kategori
        else if ($this->category !== null && $this->cheapest == null && $this->search == null) {
            $submissions = Submission::where('status', 'true')->where('category_id', $this->category)->latest()->paginate(4);
        }


        //berdasarkan title dan termurah


        else if ($this->cheapest == true && $this->search !== null && $this->category == null) {
            $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->orderBy('price', 'asc')->paginate(4);
        }

        //berdasarkan title dan category
        else if ($this->search !== null && $this->category !== null && $this->cheapest == false) {
            $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->where('category_id', $this->category)->latest()->paginate(4);
        }


        //berdasarkan kategori dan termurah
        else if ($this->search == null && $this->category !== null && $this->cheapest == true) {
            $submissions = Submission::where('status', 'true')->where('category_id', $this->category)->orderBy('price', 'asc')->paginate(4);
        }

        //berdasarkan kategori termurah dan judul
        else if ($this->search !== null && $this->category !== null && $this->cheapest == true) {
            $submissions = Submission::where('status', 'true')->where('category_id', $this->category)->where('title', 'like', '%' . $this->search . '%')->orderBy('price', 'asc')->paginate(4);
        }



        if ($this->provinsi !== null && $this->kabupaten == null) {
            $submissions = Submission::where('status', 'true')->whereHas('location', function ($q) {
                $q->where('provinsi', $this->provinsi);
            })->paginate(4);


            if ($this->search !== null && $this->cheapest == null && $this->category == null) {
                $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->whereHas('location', function ($q) {
                    $q->where('provinsi', $this->provinsi);
                })->latest()->paginate(4);
            }


            //pencarian termurah
            else if ($this->cheapest == true && $this->category == null && $this->search == null) {
                $submissions = Submission::where('status', 'true')->whereHas('location', function ($q) {
                    $q->where('provinsi', $this->provinsi);
                })->orderBy('price', 'asc')->paginate(4);
            }

            //pencarian berdasar kategori
            else if ($this->category !== null && $this->cheapest == null && $this->search == null) {
                $submissions = Submission::where('status', 'true')->where('category_id', $this->category)->whereHas('location', function ($q) {
                    $q->where('provinsi', $this->provinsi);
                })->latest()->paginate(4);
            }


            //berdasarkan title dan termurah


            else if ($this->cheapest == true && $this->search !== null && $this->category == null) {
                $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->whereHas('location', function ($q) {
                    $q->where('provinsi', $this->provinsi);
                })->orderBy('price', 'asc')->paginate(4);
            }

            //berdasarkan title dan category
            else if ($this->search !== null && $this->category !== null && $this->cheapest == false) {
                $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->where('category_id', $this->category)->whereHas('location', function ($q) {
                    $q->where('provinsi', $this->provinsi);
                })->latest()->paginate(4);
            }


            //berdasarkan kategori dan termurah
            else if ($this->search == null && $this->category !== null && $this->cheapest == true) {
                $submissions = Submission::where('status', 'true')->where('category_id', $this->category)->whereHas('location', function ($q) {
                    $q->where('provinsi', $this->provinsi);
                })->orderBy('price', 'asc')->paginate(4);
            }

            //berdasarkan kategori termurah dan judul
            else if ($this->search !== null && $this->category !== null && $this->cheapest == true) {
                $submissions = Submission::where('status', 'true')->where('category_id', $this->category)->where('title', 'like', '%' . $this->search . '%')->whereHas('location', function ($q) {
                    $q->where('provinsi', $this->provinsi);
                })->orderBy('price', 'asc')->paginate(4);
            }
        }

        if ($this->kabupaten !== null) {
            $submissions = Submission::where('status', 'true')->whereHas('location', function ($q) {
                $q->where('kabupaten', $this->kabupaten);
            })->paginate(4);


            if ($this->search !== null && $this->cheapest == null && $this->category == null) {
                $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->whereHas('location', function ($q) {
                    $q->where('kabupaten', $this->kabupaten);
                })->latest()->paginate(4);
            }


            //pencarian termurah
            else if ($this->cheapest == true && $this->category == null && $this->search == null) {
                $submissions = Submission::where('status', 'true')->whereHas('location', function ($q) {
                    $q->where('kabupaten', $this->kabupaten);
                })->orderBy('price', 'asc')->paginate(4);
            }

            //pencarian berdasar kategori
            else if ($this->category !== null && $this->cheapest == null && $this->search == null) {
                $submissions = Submission::where('status', 'true')->where('category_id', $this->category)->whereHas('location', function ($q) {
                    $q->where('kabupaten', $this->kabupaten);
                })->latest()->paginate(4);
            }


            //berdasarkan title dan termurah


            else if ($this->cheapest == true && $this->search !== null && $this->category == null) {
                $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->whereHas('location', function ($q) {
                    $q->where('kabupaten', $this->kabupaten);
                })->orderBy('price', 'asc')->paginate(4);
            }

            //berdasarkan title dan category
            else if ($this->search !== null && $this->category !== null && $this->cheapest == false) {
                $submissions = Submission::where('status', 'true')->where('title', 'like', '%' . $this->search . '%')->where('category_id', $this->category)->whereHas('location', function ($q) {
                    $q->where('kabupaten', $this->kabupaten);
                })->latest()->paginate(4);
            }


            //berdasarkan kategori dan termurah
            else if ($this->search == null && $this->category !== null && $this->cheapest == true) {
                $submissions = Submission::where('status', 'true')->where('category_id', $this->category)->whereHas('location', function ($q) {
                    $q->where('kabupaten', $this->kabupaten);
                })->orderBy('price', 'asc')->paginate(4);
            }

            //berdasarkan kategori termurah dan judul
            else if ($this->search !== null && $this->category !== null && $this->cheapest == true) {
                $submissions = Submission::where('status', 'true')->where('category_id', $this->category)->where('title', 'like', '%' . $this->search . '%')->whereHas('location', function ($q) {
                    $q->where('kabupaten', $this->kabupaten);
                })->orderBy('price', 'asc')->paginate(4);
            }
        }







        return view('livewire.product', [
            'submissions' => $submissions
        ]);
    }
}
