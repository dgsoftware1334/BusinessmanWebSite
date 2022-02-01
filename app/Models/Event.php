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
                  'lien',
<<<<<<< HEAD
                  'lieu',
      
                  'adress',
=======
                  'lieu',   
>>>>>>> 88703bf30110c5a664afb60a598232c3fb1a30d6
                  'status',   
                  'admin_id',            
    
           
    ];
    public function Admin() {
        return $this->belongsTo(App\Models\Admin::class);
      }

}
