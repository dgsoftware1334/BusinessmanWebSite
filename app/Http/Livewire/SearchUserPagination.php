<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use DB;

class SearchUserPagination extends Component
{
    use WithPagination;
    public $searchTerm = '';
    /* public $all = '';
    public $actif = '';
    public $desactif = '';*/
    public $etat = 'all';
    public $vip = 'tous';


    public function render()
    {
        $searchTerm = $this->searchTerm;




        return view('livewire.search-user-pagination', [
            'users' => User::where(function ($query) {
                        if ($this->etat == "all") {
                            $query->where('email_verified', 1);
                            $query->orWhere('email_verified', 0);
                        }
                        if ($this->etat == "actif") {
                            $query->where('email_verified', 1);
                        }
                        if ($this->etat == "desactif") {
                            $query->where('email_verified', 0);
                        }
                    })
                    ->where(function ($query) {
                        if ($this->vip == "tous") {
                            $query->where('paye', 1);
                            $query->orWhere('paye', 0);
                        }
                        if ($this->vip == "oui") {
                            $query->where('paye', 1);
                        }
                        if ($this->vip == "non") {
                            $query->where('paye', 0);
                        }
                    })
                    ->where(function($query) use ($searchTerm){
                        $query->orWhere([['name', 'LIKE', '%' . $searchTerm . '%']]);
                        $query->orWhereHas('secteur', function ($q) use ($searchTerm) {
                            $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                        });

                        $query->orWhere([
                            ['lastname', 'LIKE', '%' . $searchTerm . '%']
                        ]);
                        $query->orWhereHas('secteur', function ($q) use ($searchTerm) {
                            $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                            $q = User::where('lastname', 'LIKE', '%' . $searchTerm . '%')->doesntHave('secteur');
                        });

                        $query->orWhere([
                            ['email', 'LIKE', '%' . $searchTerm . '%']
                        ]);
                        $query->orWhereHas('secteur', function ($q) use ($searchTerm) {
                            $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                            $q = User::where('lastname', 'LIKE', '%' . $searchTerm . '%')->doesntHave('secteur');
                        });

                        $query->orWhere([
                            [DB::raw("CONCAT(users.lastname,' ',users.name)"), 'LIKE', '%' . $searchTerm . '%']
                        ])
                            ->orWhereHas('secteur', function ($q) use ($searchTerm) {
                                $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                            });
                        $query->orWhere([
                            [DB::raw("CONCAT(users.name,' ',users.lastname)"), 'LIKE', '%' . $searchTerm . '%']
                        ])
                            ->orWhereHas('secteur', function ($q) use ($searchTerm) {
                                $q->where('libelle', 'LIKE', '%' . $searchTerm . '%');
                            });
                    })

                ->paginate(10)
        ]);
    }
}
