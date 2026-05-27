<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecon extends Model
{
    protected $fillable = [
        'chapitre_id',
        'mot_allemand',
        'traduction_francaise',
        'exemple',
        'chemin_audio',
        'code_couleur',
        'chiffre',
        'ordre',
    ];

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'lecon_user')
            ->withPivot('est_ecoute', 'date_ecoute')
            ->withTimestamps();
    }
}
