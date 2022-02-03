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
                  'lieu',
<<<<<<< HEAD
      
                
=======
>>>>>>> 9f99a774a3ff59db8d342ae50c5de2106b00d29f
                  'status',   
                  'admin_id',            
    
           
    ];
    public function Admin() {
        return $this->belongsTo(App\Models\Admin::class);
      }

}
