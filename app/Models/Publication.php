<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    public function commentaires(){
        return $this->hasMany(Commentaire::class);
    }

    public function fichier_pubs(){
        return $this->hasMany(FichierPub::class);
    }
}
