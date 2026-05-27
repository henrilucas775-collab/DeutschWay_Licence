<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    protected $fillable = [
        'parcours_id',
        'slug',
        'titre',
        'sur_titre',
        'description',
        'template_vue',
        'ordre',
        'couleur_theme',
    ];

    public function parcours()
    {
        return $this->belongsTo(Parcours::class);
    }

    public function lecons()
    {
        return $this->hasMany(Lecon::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'chapitre_user')
            ->withPivot('statut', 'score')
            ->withTimestamps();
    }
}
