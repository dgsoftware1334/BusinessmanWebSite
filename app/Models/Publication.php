<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Publication extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['context', 'contenu'];
      protected $fillable = [
      	    'context',
            'contenu',
            'image',
            'status',
            'admin_id',
    ];



     public function users(){

     return $this->belongsToMany(User::class)->withPivot(['id','is_valide','contenu'
])->withTimestamps();

    }
<<<<<<< HEAD
    
=======



>>>>>>> 3e7afc4f3097f267367729700520ccec5bacb05b
    public function Admin() {
        return $this->belongsTo(App\Models\Admin::class);
      }
}
