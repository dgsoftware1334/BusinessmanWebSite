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
            'status'
    ];



     public function users(){

     return $this->belongsToMany(User::class)->withPivot(['id','is_valide','contenu'
])->withTimestamps();

    }
    public function Admin() {
        return $this->belongsTo(App\Models\Admin::class);
      }
}
