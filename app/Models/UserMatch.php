<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMatch extends Model
{
    use HasFactory ;

    public function user_competition(){
        return $this->belongsTo(UserCompetition::class);
    }
    public function matchs(){
        return $this->belongsTo(Match::class);
    }
}
