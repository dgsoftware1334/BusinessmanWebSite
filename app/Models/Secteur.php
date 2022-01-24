<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Secteur extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['libelle', 'description'];
     protected $fillable = [
             'libelle',
             'description',
             'image',
    ];

    public function Admin() {
        return $this->belongsTo(App\Models\Admin::class);
      }
}
