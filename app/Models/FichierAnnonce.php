<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Loader\AnnotationClassLoader;

class FichierAnnonce extends Model
{
    use HasFactory;
    public function annonces(){
        return $this->belongsTo(Annonce::class);
    }
}
