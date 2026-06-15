<?php

namespace App\Livewire;

use App\Models\Parcours;
use Livewire\Component;

class ParcoursChapitres extends Component
{
    public string $slug;

    public array $parcours;

    public array $chapitres = [];

    /**
     * @return list<array{titre: string, slug: string, description: string, difficulte: string, disponible: bool}>
     */
    public static function catalog(): array
    {
        $parcoursList = Parcours::all()->map(function ($p) {
            return [
                'titre' => $p->titre,
                'slug' => $p->slug,
                'description' => $p->description,
                'difficulte' => $p->difficulte,
                'disponible' => true,
            ];
        })->toArray();

        // On peut conserver un faux parcours "Avancé" pour montrer l'évolution de la plateforme, ou l'enlever selon le besoin.
        $parcoursList[] = [
            'titre' => 'Avancé',
            'slug' => 'avance',
            'description' => 'Maîtrise complète de l\'allemand, littérature, argot et nuances professionnelles.',
            'difficulte' => 'Expert (C1 -> C2)',
            'disponible' => false,
        ];

        return $parcoursList;
    }

    public function mount(string $slug): void
    {
        $this->slug = $slug;

        $parcoursModel = Parcours::where('slug', $slug)->with('chapitres')->first();

        if (! $parcoursModel) {
            abort(404, 'Parcours non trouvé');
        }

        $this->parcours = [
            'titre' => $parcoursModel->titre,
            'slug' => $parcoursModel->slug,
            'description' => $parcoursModel->description,
            'difficulte' => $parcoursModel->difficulte,
            'icone' => $parcoursModel->icone ?? 'academic-cap',
            'couleur_theme' => $parcoursModel->couleur_theme ?? 'emerald',
        ];

        $this->chapitres = $parcoursModel->chapitres->map(function ($chapitre) {

            // Transformer le hex/couleur en gradient pour les livres 3D
            $hexColor = $chapitre->couleur_theme ?? '#1e3a8a';
            // Simple logic: we just use the hex code inside the gradient, or we keep the exact string if it's already a gradient
            $themeGradient = str_contains($hexColor, 'gradient') ? $hexColor : "linear-gradient(135deg, {$hexColor} 0%, #172554 100%)";

            return [
                'titre' => $chapitre->titre,
                'slug' => $chapitre->slug,
                'description' => $chapitre->description,
                'couleur_theme' => $themeGradient,
                'icone' => 'alphabet', // À dynamiser plus tard dans la DB
                'progression' => 0, // Mock for now until we have real user progression logic
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.parcours-chapitres')
            ->layout('layouts.app', ['title' => $this->parcours['titre']]);
    }
}
