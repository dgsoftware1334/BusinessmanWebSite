<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fondateur extends Model
{
    use HasFactory;
    


   protected $fillable = [
   	        'nom',
            'prenom',
            'diplom',
            'description',
            'Telephone'
           
    ];
    public function chambre() {
        return $this->belongsTo(App\Models\Chambre::class);
      }
}
