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
=======


                  'lieu',
      
                
>>>>>>> 757608a43e44b0c574bec2ac5a838fabae4a9a08
                  'status',   
                  'admin_id',            
    
           
    ];
    public function Admin() {
        return $this->belongsTo(App\Models\Admin::class);
      }

}
