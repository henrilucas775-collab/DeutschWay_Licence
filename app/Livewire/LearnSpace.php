<?php

namespace App\Livewire;

use App\Models\Chapitre;
use Livewire\Component;
use Livewire\WithPagination;

class LearnSpace extends Component
{
    // Need to use WithPagination if we were using standard paginator, but since we have grouped data,
    // we manage pagination manually or we can flatten and paginate.
    // The user wants grouped data BUT with pagination of 28 items per page (as maquette 7x4 = 28 cards)

    public string $chapitreSlug;

    public string $parcoursSlug = 'niveau-zero';

    public array $chapitreData = [];

    public array $items = [];

    public string $templateType = 'standard';

    // Quotidien filter/search (only used when templateType === 'quotidien')
    public string $search = '';

    public string $activeCategory = 'Tous';

    public int $currentPage = 1;

    public int $perPage = 28; // 4 rows × 7 columns

    public function updatingSearch(): void
    {
        $this->currentPage = 1;
    }

    public function updatingActiveCategory(): void
    {
        $this->currentPage = 1;
    }

    public function goToPage(int $page): void
    {
        $this->currentPage = $page;
    }

    public function mount(string $chapitreSlug): void
    {
        $this->chapitreSlug = $chapitreSlug;

        $chapitre = Chapitre::where('slug', $chapitreSlug)->with(['lecons', 'parcours'])->first();

        if (! $chapitre) {
            abort(404, 'Chapitre non trouvé');
        }

        $this->parcoursSlug = $chapitre->parcours?->slug ?? 'niveau-zero';

        $this->chapitreData = [
            'id' => $chapitre->id,
            'titre' => $chapitre->titre,
            'sur_titre' => $chapitre->sur_titre,
            'description' => $chapitre->description,
        ];
        $this->templateType = $chapitre->template_vue;

        $this->items = $chapitre->lecons->map(function ($lecon) {
            return [
                'id' => $lecon->id,
                'de' => $lecon->mot_allemand,
                'article' => $lecon->article,
                'fr' => $lecon->traduction_francaise,
                'example' => $lecon->exemple,
                'audio' => $lecon->chemin_audio,
                'hex' => $lecon->code_couleur,
                'num' => $lecon->chiffre,
                'img' => $lecon->image_url,
                'categorie' => $lecon->categorie,
            ];
        })->toArray();
    }

    /**
     * Return categories list for the quotidien template
     */
    public function getCategories(): array
    {
        $cats = collect($this->items)
            ->pluck('categorie')
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->toArray();

        return array_merge(['Tous'], $cats);
    }

    /**
     * Return items filtered & searched, then grouped by category, and paginated by category.
     *
     * @return array{groups: array<string, array>, totalPages: int, totalCategories: int}
     */
    public function getFilteredItems(): array
    {
        $items = collect($this->items);

        if ($this->search !== '') {
            $q = mb_strtolower($this->search);
            $items = $items->filter(fn ($item) => str_contains(mb_strtolower($item['de']), $q) ||
                str_contains(mb_strtolower($item['fr'] ?? ''), $q)
            );
        }

        if ($this->activeCategory !== 'Tous') {
            $items = $items->filter(fn ($item) => $item['categorie'] === $this->activeCategory);
        }

        // Group the items by category, sorted A-Z within each group
        $grouped = $items
            ->groupBy('categorie')
            ->map(fn ($group) => $group->sortBy('de')->values()->toArray())
            ->sortKeys();

        // Paginate by categories (5 categories per page)
        $perPageCategories = 5;
        $totalCategories = $grouped->count();
        $totalPages = (int) ceil($totalCategories / $perPageCategories) ?: 1;

        // Clamp currentPage
        if ($this->currentPage > $totalPages) {
            $this->currentPage = $totalPages;
        }

        $pageGroups = $grouped->slice(($this->currentPage - 1) * $perPageCategories, $perPageCategories)->toArray();

        return [
            'groups' => $pageGroups,
            'totalCategories' => $totalCategories,
            'totalPages' => $totalPages,
        ];
    }

    public function markAsHeard(int $leconId): void
    {
        // Progression tracking — à implémenter.
    }

    public function generateCoachingFeedback(string $targetPhrase, float $scorePercent)
    {
        // Configuration visuelle par défaut
        $themeColorClass = 'amber';
        $teacherInitials = 'KS';
        $teacherName = 'Klaus Schneider';
        $goodChips = [];
        $warnChips = [];

        if ($scorePercent >= 80) {
            $themeColorClass = 'teal';
            $teacherInitials = 'ML';
            $teacherName = 'Marie Lefebvre';
            $goodChips = ['Fluidité', 'Prononciation'];
        } elseif ($scorePercent >= 65) {
            $themeColorClass = 'purple';
            $goodChips = ['Effort'];
            $warnChips = ['Articulations'];
        } else {
            $warnChips = ['Syllabes', 'Rythme'];
        }

        $erreurs = "Le score global est de " . round($scorePercent) . "/100.";

        try {
            $prismResponse = \Prism\Prism\Facades\Prism::text()
                ->using('gemini', 'gemini-2.5-flash')
                ->withSystemPrompt("Tu es {$teacherName}, un professeur d'allemand strict mais très encourageant. Ton élève francophone a essayé de prononcer une phrase. Sois bref (1 ou 2 phrases max) et donne un conseil PRATIQUE sur la prononciation.")
                ->withPrompt("La phrase cible était : '{$targetPhrase}'. \nVoici l'évaluation technique : {$erreurs}")
                ->generate();

            $feedbackText = $prismResponse->text;
        } catch (\Exception $e) {
            $feedbackText = "Bon effort ! Essaie d'écouter la prononciation native encore une fois et de bien détacher les syllabes.";
        }

        return [
            'scorePercent' => round($scorePercent),
            'themeColorClass' => $themeColorClass,
            'teacherInitials' => $teacherInitials,
            'teacherName' => $teacherName,
            'feedbackText' => $feedbackText,
            'goodChips' => $goodChips,
            'warnChips' => $warnChips
        ];
    }

    public function render()
    {
        $quotidienData = $this->templateType === 'quotidien' ? $this->getFilteredItems() : [];

        return view('livewire.learn-space', [
            'filteredGroups' => $quotidienData['groups'] ?? [],
            'totalPages' => $quotidienData['totalPages'] ?? 1,
            'totalItems' => $quotidienData['totalCategories'] ?? 0,
            'categories' => $this->templateType === 'quotidien' ? $this->getCategories() : [],
        ]);
    }
}
