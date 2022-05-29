<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    use HasFactory;
    protected $table = 'sujets_signal_users';
    protected $fillable = [
        'sujet_id',
        'user_id',
        'motif',
       // 'admin_id',
];
}
