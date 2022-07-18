<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;
class SearchEventPagination extends Component
{  use WithPagination;
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
 
        return view('livewire.search-event-pagination',[
            'events' => Event::where('sujet','like','%' .$searchTerm. '%')
            ->orwhere('description','like','%' .$searchTerm. '%')
            
            ->paginate(10)
        ]);
    }
}
