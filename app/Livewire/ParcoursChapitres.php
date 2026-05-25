<?php

namespace App\Livewire;

use Livewire\Component;

class ParcoursChapitres extends Component
{
    public string $slug;

    public array $parcours;

    public array $chapitres = [];

    // Fallback dictionary of all our parcours and their chapters
    protected static array $dataset = [
        'niveau-zero' => [
            'titre' => 'Niveau Zéro',
            'slug' => 'niveau-zero',
            'description' => 'La quête sacrée des fondamentaux absolus. Apprenez à lire, prononcer, compter et saluer au quotidien. Le point de départ parfait pour tous les novices complets.',
            'difficulte' => 'Débutant complet',
            'icone' => 'academic-cap',
            'couleur_theme' => 'emerald',
            'chapitres' => [
                [
                    'titre' => 'Alphabet',
                    'slug' => 'alphabet',
                    'description' => 'Les 30 lettres de l\'alphabet allemand, les Umlauts, l\'Eszett et l\'art de la prononciation correcte.',
                    'couleur_theme' => 'linear-gradient(135deg, #166534 0%, #14532d 100%)',
                    'icone' => 'alphabet',
                    'progression' => 100,
                ],
                [
                    'titre' => 'Chiffres',
                    'slug' => 'chiffres',
                    'description' => 'Compter de 0 à plus de 100, maîtriser les structures complexes des dizaines allemandes.',
                    'couleur_theme' => 'linear-gradient(135deg, #1e3a8a 0%, #172554 100%)',
                    'icone' => 'chiffres',
                    'progression' => 60,
                ],
                [
                    'titre' => 'Couleurs',
                    'slug' => 'couleurs',
                    'description' => 'Toutes les teintes essentielles pour peindre votre vocabulaire de tous les jours.',
                    'couleur_theme' => 'linear-gradient(135deg, #7c2d12 0%, #431407 100%)',
                    'icone' => 'couleurs',
                    'progression' => 0,
                ],
                [
                    'titre' => 'Salutations',
                    'slug' => 'salutations',
                    'description' => 'Formules de politesse, saluer, remercier et entamer des conversations simples au quotidien.',
                    'couleur_theme' => 'linear-gradient(135deg, #701a75 0%, #4a044e 100%)',
                    'icone' => 'salutations',
                    'progression' => 0,
                ],
                [
                    'titre' => 'Base quotidienne',
                    'slug' => 'base-quotidienne',
                    'description' => 'Heure, corps humain, météo, saisons et objets courants de votre environnement.',
                    'couleur_theme' => 'linear-gradient(135deg, #581c87 0%, #3b0764 100%)',
                    'icone' => 'quotidien',
                    'progression' => 0,
                ],
            ],
        ],
        'fondations' => [
            'titre' => 'Fondations',
            'slug' => 'fondations',
            'description' => 'Construisez votre sanctuaire de la grammaire. Maîtrisez la déclinaison des cas, la structure des phrases et la conjugaison de A1 à B1.',
            'difficulte' => 'Intermédiaire (A1 -> B1)',
            'icone' => 'academic-cap',
            'couleur_theme' => 'blue',
            'chapitres' => [
                [
                    'titre' => 'Grammaire essentielle',
                    'slug' => 'grammaire-essentielle',
                    'description' => 'Les articles définis, indéfinis et les fameuses déclinaisons allemandes.',
                    'couleur_theme' => 'linear-gradient(135deg, #1e3a8a 0%, #172554 100%)',
                    'icone' => 'grammaire',
                    'progression' => 0,
                ],
                [
                    'titre' => 'Conjugaison',
                    'slug' => 'conjugaison',
                    'description' => 'Présent, parfait et prétérit des verbes réguliers et irréguliers.',
                    'couleur_theme' => 'linear-gradient(135deg, #581c87 0%, #3b0764 100%)',
                    'icone' => 'conjugaison',
                    'progression' => 0,
                ],
            ],
        ],
        'immersion' => [
            'titre' => 'Immersion',
            'slug' => 'immersion',
            'description' => 'Plongez dans le grand bain culturel. Préparez-vous à votre future vie en Allemagne : codes sociaux, démarches, et intégration réussie.',
            'difficulte' => 'Avancé (B2 -> C1)',
            'icone' => 'academic-cap',
            'couleur_theme' => 'purple',
            'chapitres' => [
                [
                    'titre' => 'Administration',
                    'slug' => 'administration',
                    'description' => 'S\'enregistrer à la mairie, ouvrir un compte bancaire et comprendre les assurances.',
                    'couleur_theme' => 'linear-gradient(135deg, #166534 0%, #14532d 100%)',
                    'icone' => 'admin',
                    'progression' => 0,
                ],
            ],
        ],
    ];

    /**
     * @return list<array{titre: string, slug: string, description: string, difficulte: string, disponible: bool}>
     */
    public static function catalog(): array
    {
        $parcours = [];

        foreach (self::$dataset as $item) {
            $parcours[] = [
                'titre' => $item['titre'],
                'slug' => $item['slug'],
                'description' => $item['description'],
                'difficulte' => $item['difficulte'],
                'disponible' => true,
            ];
        }

        $parcours[] = [
            'titre' => 'Avancé',
            'slug' => 'avance',
            'description' => 'Maîtrise complète de l\'allemand, littérature, argot et nuances professionnelles.',
            'difficulte' => 'Expert (C1 -> C2)',
            'disponible' => false,
        ];

        return $parcours;
    }

    public function mount(string $slug): void
    {
        $this->slug = $slug;

        if (! isset(self::$dataset[$slug])) {
            abort(404, 'Parcours non trouvé');
        }

        $this->parcours = self::$dataset[$slug];
        $this->chapitres = $this->parcours['chapitres'];
    }

    public function render()
    {
        return view('livewire.parcours-chapitres')
            ->layout('layouts.app', ['title' => $this->parcours['titre']]);
    }
}
