<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use DB;
class SearchUserPagination extends Component
{    use WithPagination;
    public $searchTerm = '';

    public function render()
    {
        $searchTerm = $this->searchTerm;
      //  $secteur = '%'.$this->searchTerm.'%';
        

 
        return view('livewire.search-user-pagination',[
            'users' => User::where(function($query) use($searchTerm){
                $query->Where([['name', 'LIKE', '%' . $searchTerm . '%']]);
                $query->orWhereHas('secteur', function($q) use ($searchTerm) {
                  $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                });
            })
            
              
                
            
              
              
              
              ->orWhere([
                ['lastname', 'LIKE', '%' . $searchTerm . '%']])
                ->orWhereHas('secteur', function ($q) use ($searchTerm) {
                  $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                  $q = User::where('lastname', 'LIKE', '%' . $searchTerm . '%')->doesntHave('secteur');
                })
                ->orWhere([
                  ['email', 'LIKE', '%' . $searchTerm . '%']])
                  ->orWhereHas('secteur', function ($q) use ($searchTerm) {
                    $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                    $q = User::where('lastname', 'LIKE', '%' . $searchTerm . '%')->doesntHave('secteur');
                  })
              
                  
              
              ->orWhere([
                [DB::raw("CONCAT(users.lastname,' ',users.name)"), 'LIKE', '%' . $searchTerm . '%']])
                ->orWhereHas('secteur', function ($q) use ($searchTerm) {
                  $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
              
              })
              ->orWhere([
                [DB::raw("CONCAT(users.name,' ',users.lastname)"), 'LIKE', '%' . $searchTerm . '%']])
                ->orWhereHas('secteur', function ($q) use ($searchTerm) {
                  $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                  
                  
              })
            ->paginate(10)
        ]);
    }
}
