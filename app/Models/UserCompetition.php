<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompetition extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }
    public function user_matches(){
        return $this->hasMany(UserMatch::class);
    }
    public function etapes(){
        return $this->belongsTo(Etape::class);
    }
    public function competitions(){
        return $this->belongsTo(Competition::class);
    }
    public function user_competitions(){
        return $this->hasMany(UserBet::class);
    }
}
