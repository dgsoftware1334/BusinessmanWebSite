<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;

use App\Models\Publication;


class User   extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

  
    protected $fillable = [
        'name',
        'lastname',
        'datenaissance',
        'phone',
        'description',
        'address',
        'diplome',
        'file',
        'lienfb',
        'lieninsta',
        'lientwit',
        'linked',
        'anneexp',
        'siteweb',
        'email',
        'password',
        'status',
        'photo',
        'date_limite',
        'dateInscription',
      // 'admin_id',
        'sacteur_id',
        'paye',
        'email_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//public function admin(){

//      return $this->belongsTo('App\Models\Admin', 'admin_id');
//    }
   
   public function secteur(){

      return $this->belongsTo('App\Models\Secteur', 'sacteur_id');
    }
    public function Admin() {
        return $this->belongsTo(App\Models\Admin::class);
      }


///////relation many to many
    public function publications(){

      return $this->belongsToMany(Publication::class)->withPivot(['id','is_valide','contenu'
])->withTimestamps();
      
    }

    public function subjects(){

      return $this->belongsToMany(Sujet::class)->withPivot(['id','contenu'
])->withTimestamps();

}

public function signaled_subjects(){

  return $this->belongsToMany(Sujet::class)->withPivot(['id','motif'
])->withTimestamps();

      
    }
    public function sujets(){
        return $this->hasMany(App\Models\Sujet ::class);
      }


    }

