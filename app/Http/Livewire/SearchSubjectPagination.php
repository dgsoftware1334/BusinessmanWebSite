<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sujet;

class SearchSubjectPagination extends Component
{
    use WithPagination;
    public $searchTerm;
 
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
 
        return view('livewire.search-subject-pagination',[
            'sujets' => Sujet::where('titre','like','%' . $searchTerm. '%')
            ->orwhere('Details','like','%' .$searchTerm. '%')
            ->paginate(10)
        ]);
    }
}
