<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
class SearchUserPagination extends Component
{    use WithPagination;
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
 
        return view('livewire.search-user-pagination',[
            'users' => User::where('name','like','%' .$searchTerm. '%')
            ->orwhere('lastname','like','%' .$searchTerm. '%')
            ->paginate(10)
        ]);
    }
}
