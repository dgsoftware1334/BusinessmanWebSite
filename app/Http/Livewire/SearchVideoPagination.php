<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Video;

class SearchVideoPagination extends Component
{
    use WithPagination;
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
 
        return view('livewire.search-video-pagination',[
            'videos' => Video::where('title','like','%' .$searchTerm. '%')
            ->orwhere('description','like','%' .$searchTerm. '%')
            ->orwhere('categorie','like','%' .$searchTerm. '%')
            ->orwhere('date_expiration','like','%' .$searchTerm. '%')

            ->paginate(10)
        ]);
    }
}
