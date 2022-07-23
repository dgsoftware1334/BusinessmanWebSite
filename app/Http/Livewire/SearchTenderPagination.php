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
            
            'tenders' => Tender::where(function($query) use($searchTerm){
                $query->Where([['intitule', 'LIKE', '%' . $searchTerm . '%']]);
                $query->orWhereHas('secteur', function($q) use ($searchTerm) {
                  $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                });
            })
            ->orwhere('description','like','%' .$searchTerm. '%')
           
            


            ->paginate(10)
        ]);
    }
}
