<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBet extends Model
{
    use HasFactory;

    public function user_competitions(){
        return $this->belongsTo(UserCompetition::class);
    }
}
