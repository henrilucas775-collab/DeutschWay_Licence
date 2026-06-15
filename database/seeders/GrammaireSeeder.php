<?php

namespace Database\Seeders;

use App\Models\Chapitre;
use App\Models\Lecon;
use Illuminate\Database\Seeder;

class GrammaireSeeder extends Seeder
{
    public function run(): void
    {
        // Le chapitre A1.1 existe déjà (ID: 8, slug: a1-1, parcours_id: 2)
        $chapitre = Chapitre::where('slug', 'a1-1')->firstOrFail();

        // Nettoyer les leçons existantes pour éviter les doublons
        $chapitre->lecons()->delete();

        // --- CONJUGAISON : SEIN (être) ---
        $seinRows = [
            ['pro' => 'ich',        'proFr' => 'je',              'form' => 'bin'],
            ['pro' => 'du',         'proFr' => 'tu',              'form' => 'bist'],
            ['pro' => 'er / sie / es', 'proFr' => "il / elle / c'est", 'form' => 'ist'],
            ['pro' => 'wir',        'proFr' => 'nous',            'form' => 'sind'],
            ['pro' => 'ihr',        'proFr' => 'vous',            'form' => 'seid'],
            ['pro' => 'sie / Sie',  'proFr' => 'ils / vous',      'form' => 'sind'],
        ];

        foreach ($seinRows as $index => $row) {
            Lecon::create([
                'chapitre_id'         => $chapitre->id,
                'categorie'           => 'conjugaison-sein',
                'article'             => 'sein',
                'traduction_francaise'=> 'être',
                'mot_allemand'        => $row['pro'],   // pronom
                'exemple'             => $row['form'],  // forme conjuguée
                'code_couleur'        => $row['proFr'], // pronom FR (astuce mapping)
                'ordre'               => $index + 1,
            ]);
        }

        // --- CONJUGAISON : HABEN (avoir) ---
        $habenRows = [
            ['pro' => 'ich',        'proFr' => 'je',              'form' => 'habe'],
            ['pro' => 'du',         'proFr' => 'tu',              'form' => 'hast'],
            ['pro' => 'er / sie / es', 'proFr' => "il / elle / c'est", 'form' => 'hat'],
            ['pro' => 'wir',        'proFr' => 'nous',            'form' => 'haben'],
            ['pro' => 'ihr',        'proFr' => 'vous',            'form' => 'habt'],
            ['pro' => 'sie / Sie',  'proFr' => 'ils / vous',      'form' => 'haben'],
        ];

        foreach ($habenRows as $index => $row) {
            Lecon::create([
                'chapitre_id'         => $chapitre->id,
                'categorie'           => 'conjugaison-haben',
                'article'             => 'haben',
                'traduction_francaise'=> 'avoir',
                'mot_allemand'        => $row['pro'],
                'exemple'             => $row['form'],
                'code_couleur'        => $row['proFr'],
                'ordre'               => $index + 1,
            ]);
        }

        // --- PHRASES D'EXEMPLE : SEIN ---
        $seinPhrases = [
            ['fr' => "Je suis étudiant(e)",   'de' => "Ich bin Student"],
            ['fr' => "Tu es prêt(e) ?",        'de' => "Bist du bereit?"],
            ['fr' => "Il est médecin",          'de' => "Er ist Arzt"],
            ['fr' => "Nous sommes en retard",   'de' => "Wir sind spät"],
            ['fr' => "Je suis fatigué(e)",      'de' => "Ich bin müde"],
            ['fr' => "C'est facile",            'de' => "Das ist einfach"],
            ['fr' => "Je suis heureux",         'de' => "Ich bin glücklich"],
            ['fr' => "Je suis à la maison",     'de' => "Ich bin zu Hause"],
        ];

        foreach ($seinPhrases as $index => $phrase) {
            Lecon::create([
                'chapitre_id'         => $chapitre->id,
                'categorie'           => 'phrase-sein',
                'article'             => 'sein',
                'traduction_francaise'=> $phrase['fr'],
                'mot_allemand'        => $phrase['de'],
                'code_couleur'        => 'sein-ph', // thème CSS
                'ordre'               => $index + 1,
            ]);
        }

        // --- PHRASES D'EXEMPLE : HABEN ---
        $habenPhrases = [
            ['fr' => "J'ai faim",             'de' => "Ich habe Hunger"],
            ['fr' => "J'ai soif",             'de' => "Ich habe Durst"],
            ['fr' => "J'ai froid",            'de' => "Ich habe kalt"],
            ['fr' => "J'ai chaud",            'de' => "Ich habe warm"],
            ['fr' => "J'ai peur",             'de' => "Ich habe Angst"],
            ['fr' => "Tu as le temps ?",      'de' => "Hast du Zeit?"],
            ['fr' => "J'ai une question",     'de' => "Ich habe eine Frage"],
            ['fr' => "Nous avons un problème",'de' => "Wir haben ein Problem"],
        ];

        foreach ($habenPhrases as $index => $phrase) {
            Lecon::create([
                'chapitre_id'         => $chapitre->id,
                'categorie'           => 'phrase-haben',
                'article'             => 'haben',
                'traduction_francaise'=> $phrase['fr'],
                'mot_allemand'        => $phrase['de'],
                'code_couleur'        => 'haben-ph', // thème CSS
                'ordre'               => $index + 1,
            ]);
        }
    }
}
