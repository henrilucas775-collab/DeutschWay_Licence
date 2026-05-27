<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcours extends Model
{
    protected $fillable = [
        'slug',
        'titre',
        'description',
        'difficulte',
        'couleur_theme',
        'icone',
    ];

    public function chapitres()
    {
        return $this->hasMany(Chapitre::class);
    }
}
