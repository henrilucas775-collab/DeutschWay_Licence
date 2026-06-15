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
