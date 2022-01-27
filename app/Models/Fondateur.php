<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fondateur extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['nom', 'prenom', 'diplom','description'];


   protected $fillable = [
   	        'nom',
            'prenom',
            'diplom',
            'description',
            'Telephone',
           
            'admin_id',
            'chambre_id',
             'image',
           
    ];
    public function chambre() {
        return $this->belongsTo(App\Models\Chambre::class);
      }
}
