<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


 protected $fillable = [
                  'sujet',
                  'description',
                  'date_debut',
                  'date_fin',
                  'dure',
                  'image',
                  'type',
                  'lien',   
                  'status',               
    
           
    ];

}
