<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Event extends Model
{
    use HasFactory;

    use HasFactory;
    use HasTranslations;
    public $translatable = ['sujet', 'description'];
 protected $fillable = [
                  'sujet',
                  'description',
                  'date_debut',
                  'date_fin',
                  'dure',
                  'image',
                  'type',
<<<<<<< HEAD
                  'lien',
                  'lieu',   
=======
                  'lien', 
                  'adress',
>>>>>>> 125694824c898e093841ebb3264f59977ead91c6
                  'status',   
                  'admin_id',            
    
           
    ];
    public function Admin() {
        return $this->belongsTo(App\Models\Admin::class);
      }

}
