<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;

            
   protected $fillable = [
            'sujet',
            'description',
            'lien',
            'adresse',
            'telephone',
            'politique',
            'photo',
           
    ];



    public function fondateurs() {
        return $this->hasMany(App\Model\Fondateur::class); 
      }
}
