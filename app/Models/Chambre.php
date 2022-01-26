<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Chambre extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['sujet', 'description','adresse','politique'];
            
   protected $fillable = [
            'sujet',
            'description',
            'lien',
            'adresse',
            'telephone',
            'politique',
            'photo',
            'fb',
            'insta',
            'linked',
            'twit',
            'admin_id',
           
    ];



    public function fondateurs() {
        return $this->hasMany(Fondateur::class); 
      }
}
