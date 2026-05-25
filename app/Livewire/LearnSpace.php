<?php

namespace App\Livewire;

use Livewire\Component;

class LearnSpace extends Component
{
    public string $chapitreSlug;
    public string $parcoursSlug = 'niveau-zero'; // Default for now
    public array $chapitreData = [];
    public array $items = [];
    public string $templateType = 'standard'; // 'alphabet', 'chiffres', 'couleurs', 'salutations', 'standard'

    // Static dataset representing the content of each chapter
    protected static array $dataset = [
        'alphabet' => [
            'titre' => 'L\'Alphabet Allemand',
            'sur_titre' => 'NIVEAU ZÉRO',
            'description' => 'Cliquez sur une carte pour écouter sa prononciation.',
            'template' => 'alphabet',
            'items' => [
                ['de' => 'A', 'fr' => 'pomme', 'example' => 'Apfel', 'audio' => 'a'],
                ['de' => 'B', 'fr' => 'banane', 'example' => 'Banane', 'audio' => 'b'],
                ['de' => 'C', 'fr' => 'clown', 'example' => 'Clown', 'audio' => 'c'],
                ['de' => 'D', 'fr' => 'dauphin', 'example' => 'Delfin', 'audio' => 'd'],
                ['de' => 'E', 'fr' => 'éléphant', 'example' => 'Elefant', 'audio' => 'e'],
                ['de' => 'F', 'fr' => 'fenêtre', 'example' => 'Fenster', 'audio' => 'f'],
                ['de' => 'G', 'fr' => 'girafe', 'example' => 'Giraffe', 'audio' => 'g'],
                ['de' => 'H', 'fr' => 'chien', 'example' => 'Hund', 'audio' => 'h'],
                ['de' => 'I', 'fr' => 'hérisson', 'example' => 'Igel', 'audio' => 'i'],
                ['de' => 'J', 'fr' => 'garçon', 'example' => 'Junge', 'audio' => 'j'],
                ['de' => 'K', 'fr' => 'chat', 'example' => 'Katze', 'audio' => 'k'],
                ['de' => 'L', 'fr' => 'lion', 'example' => 'Löwe', 'audio' => 'l'],
                ['de' => 'M', 'fr' => 'souris', 'example' => 'Maus', 'audio' => 'm'],
                ['de' => 'N', 'fr' => 'nez', 'example' => 'Nase', 'audio' => 'n'],
                ['de' => 'O', 'fr' => 'oreille', 'example' => 'Ohr', 'audio' => 'o'],
                ['de' => 'P', 'fr' => 'cheval', 'example' => 'Pferd', 'audio' => 'p'],
                ['de' => 'Q', 'fr' => 'méduse', 'example' => 'Qualle', 'audio' => 'q'],
                ['de' => 'R', 'fr' => 'bague', 'example' => 'Ring', 'audio' => 'r'],
                ['de' => 'S', 'fr' => 'soleil', 'example' => 'Sonne', 'audio' => 's'],
                ['de' => 'T', 'fr' => 'table', 'example' => 'Tisch', 'audio' => 't'],
                ['de' => 'U', 'fr' => 'horloge', 'example' => 'Uhr', 'audio' => 'u'],
                ['de' => 'V', 'fr' => 'oiseau', 'example' => 'Vogel', 'audio' => 'v'],
                ['de' => 'W', 'fr' => 'eau', 'example' => 'Wasser', 'audio' => 'w'],
                ['de' => 'X', 'fr' => 'xylophone', 'example' => 'Xylophon', 'audio' => 'x'],
                ['de' => 'Y', 'fr' => 'yack', 'example' => 'Yak', 'audio' => 'y'],
                ['de' => 'Z', 'fr' => 'train', 'example' => 'Zug', 'audio' => 'z'],
                ['de' => 'Ä', 'fr' => 'pomme', 'example' => 'Äpfel', 'audio' => 'ae'],
                ['de' => 'Ö', 'fr' => 'huile', 'example' => 'Öl', 'audio' => 'oe'],
                ['de' => 'Ü', 'fr' => 'au-dessus', 'example' => 'Über', 'audio' => 'ue'],
                ['de' => 'ß', 'fr' => 'rue', 'example' => 'Straße', 'audio' => 'ss'],
            ]
        ],
        'chiffres' => [
            'titre' => 'Les Chiffres',
            'sur_titre' => 'NIVEAU ZÉRO',
            'description' => 'Apprenez à compter en allemand.',
            'template' => 'chiffres',
            'items' => [
                ['num' => '0', 'de' => 'null', 'audio' => '0'],
                ['num' => '1', 'de' => 'eins', 'audio' => '1'],
                ['num' => '2', 'de' => 'zwei', 'audio' => '2'],
                ['num' => '3', 'de' => 'drei', 'audio' => '3'],
                ['num' => '4', 'de' => 'vier', 'audio' => '4'],
                ['num' => '5', 'de' => 'fünf', 'audio' => '5'],
                ['num' => '6', 'de' => 'sechs', 'audio' => '6'],
                ['num' => '7', 'de' => 'sieben', 'audio' => '7'],
                ['num' => '8', 'de' => 'acht', 'audio' => '8'],
                ['num' => '9', 'de' => 'neun', 'audio' => '9'],
                ['num' => '10', 'de' => 'zehn', 'audio' => '10'],
                ['num' => '11', 'de' => 'elf', 'audio' => '11'],
                ['num' => '12', 'de' => 'zwölf', 'audio' => '12'],
                ['num' => '13', 'de' => 'dreizehn', 'audio' => '13'],
                ['num' => '14', 'de' => 'vierzehn', 'audio' => '14'],
                ['num' => '15', 'de' => 'fünfzehn', 'audio' => '15'],
                ['num' => '16', 'de' => 'sechzehn', 'audio' => '16'],
                ['num' => '17', 'de' => 'siebzehn', 'audio' => '17'],
                ['num' => '18', 'de' => 'achtzehn', 'audio' => '18'],
                ['num' => '19', 'de' => 'neunzehn', 'audio' => '19'],
                ['num' => '20', 'de' => 'zwanzig', 'audio' => '20'],
            ]
        ],
        'couleurs' => [
            'titre' => 'Les Couleurs',
            'sur_titre' => 'NIVEAU ZÉRO',
            'description' => 'Écoutez et mémorisez les couleurs en allemand.',
            'template' => 'couleurs',
            'items' => [
                ['de' => 'Rot', 'fr' => 'Rouge', 'hex' => '#E74C3C', 'audio' => 'rot'],
                ['de' => 'Blau', 'fr' => 'Bleu', 'hex' => '#3498DB', 'audio' => 'blau'],
                ['de' => 'Grün', 'fr' => 'Vert', 'hex' => '#2ECC71', 'audio' => 'gruen'],
                ['de' => 'Gelb', 'fr' => 'Jaune', 'hex' => '#F1C40F', 'audio' => 'gelb'],
                ['de' => 'Orange', 'fr' => 'Orange', 'hex' => '#F39C12', 'audio' => 'orange'],
                ['de' => 'Lila', 'fr' => 'Violet', 'hex' => '#9B59B6', 'audio' => 'lila'],
                ['de' => 'Schwarz', 'fr' => 'Noir', 'hex' => '#2C3E50', 'audio' => 'schwarz'],
                ['de' => 'Weiß', 'fr' => 'Blanc', 'hex' => '#ECF0F1', 'audio' => 'weiss'],
                ['de' => 'Grau', 'fr' => 'Gris', 'hex' => '#95A5A6', 'audio' => 'grau'],
                ['de' => 'Braun', 'fr' => 'Brun', 'hex' => '#8B4513', 'audio' => 'braun'],
            ]
        ],
        'salutations' => [
            'titre' => 'Salutation et politesse',
            'sur_titre' => 'NIVEAU ZÉRO',
            'description' => 'Écoutez et mémorisez les formules de politesse essentielles.',
            'template' => 'salutations',
            'items' => [
                ['de' => 'Hallo', 'fr' => 'Bonjour', 'audio' => 'hallo'],
                ['de' => 'Tschüss', 'fr' => 'Au revoir', 'audio' => 'tschuess'],
                ['de' => 'Guten Morgen', 'fr' => 'Bonjour (matin)', 'audio' => 'guten-morgen'],
                ['de' => 'Guten Abend', 'fr' => 'Bonsoir', 'audio' => 'guten-abend'],
                ['de' => 'Danke', 'fr' => 'Merci', 'audio' => 'danke'],
                ['de' => 'Bitte', 'fr' => 'S\'il vous plaît / De rien', 'audio' => 'bitte'],
                ['de' => 'Entschuldigung', 'fr' => 'Pardon / Excusez-moi', 'audio' => 'entschuldigung'],
                ['de' => 'Ja', 'fr' => 'Oui', 'audio' => 'ja'],
                ['de' => 'Nein', 'fr' => 'Non', 'audio' => 'nein'],
                ['de' => 'Wie geht\'s?', 'fr' => 'Comment ça va ?', 'audio' => 'wie-gehts'],
            ]
        ],
    ];

    public function mount(string $chapitreSlug): void
    {
        $this->chapitreSlug = $chapitreSlug;

        if (!isset(self::$dataset[$chapitreSlug])) {
            abort(404, 'Chapitre non trouvé');
        }

        $data = self::$dataset[$chapitreSlug];
        $this->chapitreData = [
            'titre' => $data['titre'],
            'sur_titre' => $data['sur_titre'],
            'description' => $data['description'],
        ];
        $this->templateType = $data['template'];
        $this->items = $data['items'];
    }

    public function markAsHeard(int $index)
    {
        // Enregistre la progression en base de données ou en session.
        // À implémenter plus tard.
    }

    public function render()
    {
        return view('livewire.learn-space');
    }
}
