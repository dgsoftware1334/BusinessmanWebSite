<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Publication;
use Livewire\WithPagination;

class SearchPostsPagination extends Component
{
    use WithPagination;
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
 
        return view('livewire.search-posts-pagination',[
            'publications' => Publication::where('context','like','%' .$searchTerm. '%')
            ->orwhere('contenu','like','%' .$searchTerm. '%')
            
            ->paginate(10)
        ]);
    }
}
