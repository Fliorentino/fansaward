<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function publications(){
        return $this->belongsTo(Commentaire::class);
    }
}
