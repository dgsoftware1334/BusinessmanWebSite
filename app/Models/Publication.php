<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
      protected $fillable = [
      	    'contenu',
            'context',
            'image',
            'status'
    ];



     public function users(){

     return $this->belongsToMany(User::class)->withPivot(['id','is_valide','contenu'
])->withTimestamps();

    }
}
