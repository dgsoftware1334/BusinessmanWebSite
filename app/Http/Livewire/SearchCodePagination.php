<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Code;
 

class SearchCodePagination extends Component
{
    use WithPagination;
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
 
        return view('livewire.search-code-pagination',[
            'codes' => Code::where('code','like','%' .$searchTerm. '%')
            ->orwhere('title','like','%' .$searchTerm. '%')
            ->orwhere('description','like','%' .$searchTerm. '%')
            
            
            ->paginate(10)
        ]);
    }
}
