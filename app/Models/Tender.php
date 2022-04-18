<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tender extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['intitule', 'description','type','adresse','societe','wilaya'];
    protected $guarded = [];
    public function secteur(){

        return $this->belongsTo('App\Models\Secteur', 'sacteur_id');
      }

}
