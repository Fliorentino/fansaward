<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function disks(){
        return $this->hasMany(Disk::class);
    }
    public function commentaires(){
        $this->hasMany(Commentaire::class);
    }

    public function chats(){
        return $this->hasMany(Chat::class);
    }
    public function annonces(){
        return $this->hasMany(Annonce::class);
    }
    public function user_competitions(){
        return $this->belongsTo(UserCompetition::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
