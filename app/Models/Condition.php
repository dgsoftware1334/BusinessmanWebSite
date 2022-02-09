<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Condition extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['description'];
    protected $fillable = [
        'description',
];
}
