<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tender;

class SearchTenderPagination extends Component
{
    use WithPagination;
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
 
        return view('livewire.search-tender-pagination',[
            'tenders' => Tender::where('intitule','like','%' .$searchTerm. '%')
            ->orwhere('description','like','%' .$searchTerm. '%')
            ->paginate(10)
        ]);
    }
}
