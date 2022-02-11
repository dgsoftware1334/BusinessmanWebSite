<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'details',
        'image',
       // 'admin_id',
];

public function user() {
    return $this->belongsTo(User::class);
  }

  public function users(){

    return $this->belongsToMany(User::class)->withPivot(['id','contenu'
])->withTimestamps();

   }
}
