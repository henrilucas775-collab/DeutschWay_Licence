<?php

namespace App\Livewire;

use App\Models\Chapitre;
use Livewire\Component;

class LearnSpace extends Component
{
    public string $chapitreSlug;
    public string $parcoursSlug = 'niveau-zero'; // Default for now
    public array $chapitreData = [];
    public array $items = [];
    public string $templateType = 'standard'; // 'alphabet', 'chiffres', 'couleurs', 'salutations', 'standard'

    public function mount(string $chapitreSlug): void
    {
        $this->chapitreSlug = $chapitreSlug;

        $chapitre = Chapitre::where('slug', $chapitreSlug)->with('lecons')->first();

        if (!$chapitre) {
            abort(404, 'Chapitre non trouvé');
        }

        $this->chapitreData = [
            'id' => $chapitre->id,
            'titre' => $chapitre->titre,
            'sur_titre' => $chapitre->sur_titre,
            'description' => $chapitre->description,
        ];
        $this->templateType = $chapitre->template_vue;
        
        $this->items = $chapitre->lecons->map(function($lecon) {
            return [
                'id' => $lecon->id,
                'de' => $lecon->mot_allemand,
                'fr' => $lecon->traduction_francaise,
                'example' => $lecon->exemple,
                'audio' => $lecon->chemin_audio,
                'hex' => $lecon->code_couleur,
                'num' => $lecon->chiffre,
            ];
        })->toArray();
    }

    public function markAsHeard(int $leconId)
    {
        // Enregistre la progression en base de données ou en session.
        // À implémenter plus tard.
    }

    public function render()
    {
        return view('livewire.learn-space');
    }
}
