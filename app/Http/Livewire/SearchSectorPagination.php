<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;

use Livewire\Component;
use App\Models\Secteur;

class SearchSectorPagination extends Component
{
    use WithPagination;
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
 
        return view('livewire.search-sector-pagination',[
            'secteurs' => Secteur::where('libelle','like','%' .$searchTerm. '%')
            ->orwhere('description','like','%' .$searchTerm. '%')
            
            
            ->paginate(10)
        ]);
    }
}
