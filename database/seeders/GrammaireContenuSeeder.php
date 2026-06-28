<?php

namespace Database\Seeders;

use App\Models\Chapitre;
use App\Models\Lecon;
use Illuminate\Database\Seeder;

class GrammaireContenuSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedA12();
        $this->seedA21();
        $this->seedA22();
    }

    protected function seedA12(): void
    {
        $chapitre = Chapitre::where('slug', 'a1-2')->firstOrFail();
        $chapitre->lecons()->delete();

        $conjugaisonLernen = [
            ['pro' => 'ich', 'form' => 'lerne', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'lernst', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'lernt', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'lernen', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'lernt', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'lernen', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonLernen as $index => $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-lernen',
                'article' => 'lernen',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'apprendre',
                'code_couleur' => $row['proFr'],
                'ordre' => $index + 1,
            ]);
        }

        $conjugaisonSpielen = [
            ['pro' => 'ich', 'form' => 'spiele', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'spielst', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'spielt', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'spielen', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'spielt', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'spielen', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonSpielen as $index => $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-spielen',
                'article' => 'spielen',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'jouer',
                'code_couleur' => $row['proFr'],
                'ordre' => 6 + $index + 1,
            ]);
        }

        $conjugaisonWohnen = [
            ['pro' => 'ich', 'form' => 'wohne', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'wohnst', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'wohnt', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'wohnen', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'wohnt', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'wohnen', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonWohnen as $index => $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-wohnen',
                'article' => 'wohnen',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'habiter',
                'code_couleur' => $row['proFr'],
                'ordre' => 12 + $index + 1,
            ]);
        }

        $conjugaisonKaufen = [
            ['pro' => 'ich', 'form' => 'kaufe', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'kaufst', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'kauft', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'kaufen', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'kauft', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'kaufen', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonKaufen as $index => $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-kaufen',
                'article' => 'kaufen',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'acheter',
                'code_couleur' => $row['proFr'],
                'ordre' => 18 + $index + 1,
            ]);
        }

        $ordre = 24;

        $rows = [
            ['categorie' => 'articles', 'article' => 'der', 'mot_allemand' => 'der Tisch', 'traduction_francaise' => 'la table', 'code_couleur' => 'article'],
            ['categorie' => 'articles', 'article' => 'die', 'mot_allemand' => 'die Lampe', 'traduction_francaise' => 'la lampe', 'code_couleur' => 'article'],
            ['categorie' => 'articles', 'article' => 'das', 'mot_allemand' => 'das Buch', 'traduction_francaise' => 'le livre', 'code_couleur' => 'article'],
            ['categorie' => 'articles', 'article' => 'ein', 'mot_allemand' => 'ein Stuhl', 'traduction_francaise' => 'une chaise', 'code_couleur' => 'article'],
            ['categorie' => 'articles', 'article' => 'eine', 'mot_allemand' => 'eine Tasche', 'traduction_francaise' => 'un sac', 'code_couleur' => 'article'],

            ['categorie' => 'genre', 'article' => 'der', 'mot_allemand' => 'der Hund', 'traduction_francaise' => 'le chien', 'code_couleur' => 'genre'],
            ['categorie' => 'genre', 'article' => 'die', 'mot_allemand' => 'die Katze', 'traduction_francaise' => 'le chat', 'code_couleur' => 'genre'],
            ['categorie' => 'genre', 'article' => 'das', 'mot_allemand' => 'das Mädchen', 'traduction_francaise' => 'la fille', 'code_couleur' => 'genre'],
            ['categorie' => 'genre', 'article' => 'der', 'mot_allemand' => 'der Lehrer', 'traduction_francaise' => 'le professeur', 'code_couleur' => 'genre'],

            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich heiße Sophie', 'traduction_francaise' => 'Je m’appelle Sophie', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich wohne in Berlin', 'traduction_francaise' => 'Je vis à Berlin', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Mein Zimmer ist groß', 'traduction_francaise' => 'Ma chambre est grande', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich habe einen Bruder', 'traduction_francaise' => 'J’ai un frère', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich spreche Französisch', 'traduction_francaise' => 'Je parle français', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Das Buch liegt auf dem Tisch', 'traduction_francaise' => 'Le livre est sur la table', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich habe eine rote Tasche', 'traduction_francaise' => 'J’ai un sac rouge', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Mein Haus ist klein', 'traduction_francaise' => 'Ma maison est petite', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich arbeite von zu Hause', 'traduction_francaise' => 'Je travaille de chez moi', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich lerne Deutsch', 'traduction_francaise' => 'J’apprends l’allemand', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich habe einen Hund', 'traduction_francaise' => 'J’ai un chien', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich spiele Fußball', 'traduction_francaise' => 'Je joue au football', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich esse gern Brot', 'traduction_francaise' => 'J’aime manger du pain', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich trinke Wasser', 'traduction_francaise' => 'Je bois de l’eau', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich bin heute müde', 'traduction_francaise' => 'Je suis fatigué aujourd’hui', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich habe viele Freunde', 'traduction_francaise' => 'J’ai beaucoup d’amis', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich gehe in den Park', 'traduction_francaise' => 'Je vais au parc', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich mag meine Stadt', 'traduction_francaise' => 'J’aime ma ville', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich wohne neben der Schule', 'traduction_francaise' => 'J’habite à côté de l’école', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich habe einen Balkon', 'traduction_francaise' => 'J’ai un balcon', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Mein Auto ist blau', 'traduction_francaise' => 'Ma voiture est bleue', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich fahre mit dem Bus', 'traduction_francaise' => 'Je prends le bus', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich kaufe Obst im Supermarkt', 'traduction_francaise' => 'J’achète des fruits au supermarché', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich koche jeden Abend', 'traduction_francaise' => 'Je cuisine chaque soir', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Meine Mutter ist Lehrerin', 'traduction_francaise' => 'Ma mère est enseignante', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Mein Vater arbeitet im Büro', 'traduction_francaise' => 'Mon père travaille au bureau', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich gehe jeden Morgen spazieren', 'traduction_francaise' => 'Je me promène chaque matin', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich habe einen guten Freund', 'traduction_francaise' => 'J’ai un bon ami', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich sitze am Fenster', 'traduction_francaise' => 'Je suis assis à la fenêtre', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich sehe den Garten', 'traduction_francaise' => 'Je vois le jardin', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Die Wohnung ist hell', 'traduction_francaise' => 'L’appartement est lumineux', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich lerne jeden Tag', 'traduction_francaise' => 'J’apprends chaque jour', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich bin in der Küche', 'traduction_francaise' => 'Je suis dans la cuisine', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich höre Musik', 'traduction_francaise' => 'J’écoute de la musique', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich habe einen Stuhl', 'traduction_francaise' => 'J’ai une chaise', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich habe einen Stift', 'traduction_francaise' => 'J’ai un stylo', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Das Fenster ist offen', 'traduction_francaise' => 'La fenêtre est ouverte', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Die Katze ist im Zimmer', 'traduction_francaise' => 'Le chat est dans la chambre', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich habe einen Computer', 'traduction_francaise' => 'J’ai un ordinateur', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich schreibe einen Brief', 'traduction_francaise' => 'J’écris une lettre', 'code_couleur' => 'phrase'],
        ];

        foreach ($rows as $index => $row) {
            Lecon::create(array_merge($row, [
                'chapitre_id' => $chapitre->id,
                'ordre' => $ordre++,
            ]));
        }
    }

    protected function seedA21(): void
    {
        $chapitre = Chapitre::where('slug', 'a2-1')->firstOrFail();
        $chapitre->lecons()->delete();

        $ordre = 1;

        $conjugaisonKonnen = [
            ['pro' => 'ich', 'form' => 'kann', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'kannst', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'kann', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'können', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'könnt', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'können', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonKonnen as $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-koennen',
                'article' => 'können',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'pouvoir',
                'code_couleur' => $row['proFr'],
                'ordre' => $ordre++,
            ]);
        }

        $conjugaisonMussen = [
            ['pro' => 'ich', 'form' => 'muss', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'musst', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'muss', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'müssen', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'müsst', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'müssen', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonMussen as $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-mussen',
                'article' => 'müssen',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'devoir',
                'code_couleur' => $row['proFr'],
                'ordre' => $ordre++,
            ]);
        }

        $conjugaisonWollen = [
            ['pro' => 'ich', 'form' => 'will', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'willst', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'will', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'wollen', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'wollt', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'wollen', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonWollen as $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-wollen',
                'article' => 'wollen',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'vouloir',
                'code_couleur' => $row['proFr'],
                'ordre' => $ordre++,
            ]);
        }

        $rows = [
            ['categorie' => 'negation', 'article' => 'nicht', 'mot_allemand' => 'Ich spreche nicht Deutsch', 'traduction_francaise' => 'Je ne parle pas allemand', 'code_couleur' => 'negation'],
            ['categorie' => 'negation', 'article' => 'kein', 'mot_allemand' => 'Ich habe keinen Hund', 'traduction_francaise' => 'Je n’ai pas de chien', 'code_couleur' => 'negation'],
            ['categorie' => 'negation', 'article' => 'nicht', 'mot_allemand' => 'Das ist nicht gut', 'traduction_francaise' => 'Ce n’est pas bon', 'code_couleur' => 'negation'],

            ['categorie' => 'connecteurs', 'article' => 'und', 'mot_allemand' => 'Ich esse und ich trinke', 'traduction_francaise' => 'Je mange et je bois', 'code_couleur' => 'connector'],
            ['categorie' => 'connecteurs', 'article' => 'aber', 'mot_allemand' => 'Ich bin müde, aber glücklich', 'traduction_francaise' => 'Je suis fatigué mais heureux', 'code_couleur' => 'connector'],
            ['categorie' => 'connecteurs', 'article' => 'weil', 'mot_allemand' => 'Ich bleibe hier, weil ich lernen muss', 'traduction_francaise' => 'Je reste ici parce que je dois étudier', 'code_couleur' => 'connector'],
            ['categorie' => 'connecteurs', 'article' => 'oder', 'mot_allemand' => 'Möchtest du Tee oder Kaffee?', 'traduction_francaise' => 'Veux-tu du thé ou du café?', 'code_couleur' => 'connector'],

            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Kannst du mir helfen?', 'traduction_francaise' => 'Peux-tu m’aider?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was machst du heute?', 'traduction_francaise' => 'Que fais-tu aujourd’hui?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich muss einkaufen gehen', 'traduction_francaise' => 'Je dois aller faire des courses', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo ist die nächste U-Bahn?', 'traduction_francaise' => 'Où est le métro le plus proche?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich möchte etwas fragen', 'traduction_francaise' => 'Je voudrais poser une question', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wie spät ist es?', 'traduction_francaise' => 'Quelle heure est-il?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was isst du gern?', 'traduction_francaise' => 'Qu’aimes-tu manger?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo arbeitest du?', 'traduction_francaise' => 'Où travailles-tu?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Warum bist du hier?', 'traduction_francaise' => 'Pourquoi es-tu ici?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was möchtest du trinken?', 'traduction_francaise' => 'Que veux-tu boire?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Kann ich das haben?', 'traduction_francaise' => 'Puis-je avoir cela?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wie heißt du?', 'traduction_francaise' => 'Comment tu t’appelles?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Woher kommst du?', 'traduction_francaise' => 'D’où viens-tu?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was studierst du?', 'traduction_francaise' => 'Qu’étudies-tu?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wie fühlst du dich heute?', 'traduction_francaise' => 'Comment te sens-tu aujourd’hui?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was sind deine Pläne?', 'traduction_francaise' => 'Quels sont tes projets?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Kannst du das wiederholen?', 'traduction_francaise' => 'Peux-tu répéter cela?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was ist dein Lieblingsessen?', 'traduction_francaise' => 'Quel est ton plat préféré?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wie lange bleibst du?', 'traduction_francaise' => 'Combien de temps restes-tu?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was machst du am Wochenende?', 'traduction_francaise' => 'Que fais-tu ce week-end?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Kannst du langsamer sprechen?', 'traduction_francaise' => 'Peux-tu parler plus lentement?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Möchtest du einen Kaffee?', 'traduction_francaise' => 'Veux-tu un café?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was machst du am Abend?', 'traduction_francaise' => 'Que fais-tu ce soir?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wie war dein Tag?', 'traduction_francaise' => 'Comment était ta journée?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was brauchst du?', 'traduction_francaise' => 'De quoi as-tu besoin?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Kann ich dir helfen?', 'traduction_francaise' => 'Puis-je t’aider?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was für Musik magst du?', 'traduction_francaise' => 'Quel genre de musique aimes-tu?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was ist dein Hobby?', 'traduction_francaise' => 'Quel est ton passe-temps?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was denkst du darüber?', 'traduction_francaise' => 'Que penses-tu de cela?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Kannst du mir das zeigen?', 'traduction_francaise' => 'Peux-tu me montrer cela?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Willst du mit mir gehen?', 'traduction_francaise' => 'Veux-tu venir avec moi?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Muss ich warten?', 'traduction_francaise' => 'Dois-je attendre?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo arbeitest du heute?', 'traduction_francaise' => 'Où travailles-tu aujourd’hui?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was ist dein Beruf?', 'traduction_francaise' => 'Quel est ton métier?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Hast du Kinder?', 'traduction_francaise' => 'As-tu des enfants?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Spielst du gern Tennis?', 'traduction_francaise' => 'Aimes-tu jouer au tennis?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Liest du gern Bücher?', 'traduction_francaise' => 'Aimes-tu lire des livres?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Sprichst du oft Deutsch?', 'traduction_francaise' => 'Parles-tu souvent allemand?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Was hast du gestern gemacht?', 'traduction_francaise' => 'Qu’as-tu fait hier?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wie findest du diese Stadt?', 'traduction_francaise' => 'Que penses-tu de cette ville?', 'code_couleur' => 'phrase'],
        ];

        foreach ($rows as $index => $row) {
            Lecon::create(array_merge($row, [
                'chapitre_id' => $chapitre->id,
                'ordre' => $ordre++,
            ]));
        }
    }

    protected function seedA22(): void
    {
        $chapitre = Chapitre::where('slug', 'a2-2')->firstOrFail();
        $chapitre->lecons()->delete();

        $ordre = 1;

        $conjugaisonPerfekt = [
            ['pro' => 'ich', 'form' => 'habe gegessen', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'hast gegessen', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'hat gegessen', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'haben gegessen', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'habt gegessen', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'haben gegessen', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonPerfekt as $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-perfekt',
                'article' => 'haben',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'avoir mangé',
                'code_couleur' => $row['proFr'],
                'ordre' => $ordre++,
            ]);
        }

        $conjugaisonPerfektSein = [
            ['pro' => 'ich', 'form' => 'bin gegangen', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'bist gegangen', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'ist gegangen', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'sind gegangen', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'seid gegangen', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'sind gegangen', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonPerfektSein as $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-perfekt',
                'article' => 'sein',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'être allé',
                'code_couleur' => $row['proFr'],
                'ordre' => $ordre++,
            ]);
        }

        $conjugaisonPerfektSchlafen = [
            ['pro' => 'ich', 'form' => 'habe geschlafen', 'proFr' => 'je'],
            ['pro' => 'du', 'form' => 'hast geschlafen', 'proFr' => 'tu'],
            ['pro' => 'er / sie / es', 'form' => 'hat geschlafen', 'proFr' => 'il / elle / c’est'],
            ['pro' => 'wir', 'form' => 'haben geschlafen', 'proFr' => 'nous'],
            ['pro' => 'ihr', 'form' => 'habt geschlafen', 'proFr' => 'vous'],
            ['pro' => 'sie / Sie', 'form' => 'haben geschlafen', 'proFr' => 'ils / vous'],
        ];

        foreach ($conjugaisonPerfektSchlafen as $row) {
            Lecon::create([
                'chapitre_id' => $chapitre->id,
                'categorie' => 'conjugaison-perfekt',
                'article' => 'haben',
                'mot_allemand' => $row['pro'],
                'exemple' => $row['form'],
                'traduction_francaise' => 'avoir dormi',
                'code_couleur' => $row['proFr'],
                'ordre' => $ordre++,
            ]);
        }

        $rows = [
            ['categorie' => 'prepositions', 'article' => 'in', 'mot_allemand' => 'in der Stadt', 'traduction_francaise' => 'dans la ville', 'code_couleur' => 'preposition'],
            ['categorie' => 'prepositions', 'article' => 'auf', 'mot_allemand' => 'auf dem Tisch', 'traduction_francaise' => 'sur la table', 'code_couleur' => 'preposition'],
            ['categorie' => 'prepositions', 'article' => 'mit', 'mot_allemand' => 'mit dem Freund', 'traduction_francaise' => 'avec l’ami', 'code_couleur' => 'preposition'],
            ['categorie' => 'prepositions', 'article' => 'für', 'mot_allemand' => 'für das Essen', 'traduction_francaise' => 'pour la nourriture', 'code_couleur' => 'preposition'],

            ['categorie' => 'ordre-mots', 'article' => 'inversion', 'mot_allemand' => 'Heute gehe ich ins Kino', 'traduction_francaise' => 'Aujourd’hui, je vais au cinéma', 'code_couleur' => 'inversion'],
            ['categorie' => 'ordre-mots', 'article' => 'inversion', 'mot_allemand' => 'Morgen werde ich dich sehen', 'traduction_francaise' => 'Demain, je te verrai', 'code_couleur' => 'inversion'],
            ['categorie' => 'ordre-mots', 'article' => 'inversion', 'mot_allemand' => 'Jetzt muss ich gehen', 'traduction_francaise' => 'Maintenant je dois partir', 'code_couleur' => 'inversion'],

            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich möchte einen Kaffee bestellen', 'traduction_francaise' => 'Je voudrais commander un café', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo ist die nächste Straße?', 'traduction_francaise' => 'Où est la rue la plus proche?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich suche einen Supermarkt', 'traduction_francaise' => 'Je cherche un supermarché', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Kann ich mit Karte bezahlen?', 'traduction_francaise' => 'Puis-je payer par carte?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich muss zum Bahnhof', 'traduction_francaise' => 'Je dois aller à la gare', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich kaufe Brot und Käse', 'traduction_francaise' => 'J’achète du pain et du fromage', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich möchte einen Tisch reservieren', 'traduction_francaise' => 'Je voudrais réserver une table', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Haben Sie eine Speisekarte?', 'traduction_francaise' => 'Avez-vous une carte?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich hätte gern ein Glas Wasser', 'traduction_francaise' => 'Je voudrais un verre d’eau', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo finde ich ein Taxi?', 'traduction_francaise' => 'Où puis-je trouver un taxi?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wie komme ich zum Museum?', 'traduction_francaise' => 'Comment puis-je aller au musée?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich brauche einen Stadtplan', 'traduction_francaise' => 'J’ai besoin d’un plan de la ville', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Kann ich die Rechnung haben?', 'traduction_francaise' => 'Puis-je avoir l’addition?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo ist der Bahnhof?', 'traduction_francaise' => 'Où est la gare?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich suche eine Apotheke', 'traduction_francaise' => 'Je cherche une pharmacie', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich möchte ein Brot kaufen', 'traduction_francaise' => 'Je voudrais acheter du pain', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo ist der nächste Geldautomat?', 'traduction_francaise' => 'Où est le distributeur le plus proche?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wie viel kostet das?', 'traduction_francaise' => 'Combien ça coûte?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich nehme das bitte', 'traduction_francaise' => 'Je prends cela s’il vous plaît', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich möchte zwei Brötchen', 'traduction_francaise' => 'Je voudrais deux petits pains', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Können Sie mir den Weg zeigen?', 'traduction_francaise' => 'Pouvez-vous me montrer le chemin?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich möchte eine Fahrkarte kaufen', 'traduction_francaise' => 'Je veux acheter un billet', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo ist der Ausgang?', 'traduction_francaise' => 'Où est la sortie?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich suche ein Hotel', 'traduction_francaise' => 'Je cherche un hôtel', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Kann ich das umtauschen?', 'traduction_francaise' => 'Puis-je échanger cela?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich brauche eine Kreditkarte', 'traduction_francaise' => 'J’ai besoin d’une carte bancaire', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wie lange dauert die Fahrt?', 'traduction_francaise' => 'Combien de temps dure le trajet?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich bestelle ein Sandwich', 'traduction_francaise' => 'Je commande un sandwich', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich bezahle bar', 'traduction_francaise' => 'Je paie en espèces', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ist der Zug pünktlich?', 'traduction_francaise' => 'Le train est-il à l’heure?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Können Sie langsamer sprechen?', 'traduction_francaise' => 'Pouvez-vous parler plus lentement?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich möchte einen Kaffee ohne Milch', 'traduction_francaise' => 'Je voudrais un café sans lait', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo ist das nächste Restaurant?', 'traduction_francaise' => 'Où est le restaurant le plus proche?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Können Sie mir das empfehlen?', 'traduction_francaise' => 'Pouvez-vous me le recommander?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Welche Getränke haben Sie?', 'traduction_francaise' => 'Quelles boissons avez-vous?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich brauche eine Tüte', 'traduction_francaise' => 'J’ai besoin d’un sac', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich suche eine Bäckerei', 'traduction_francaise' => 'Je cherche une boulangerie', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Gibt es hier WLAN?', 'traduction_francaise' => 'Y a-t-il du Wi-Fi ici?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Wo ist die Toilette?', 'traduction_francaise' => 'Où est les toilettes?', 'code_couleur' => 'phrase'],
            ['categorie' => 'phrases', 'article' => 'phrase', 'mot_allemand' => 'Ich möchte ein Geschenk kaufen', 'traduction_francaise' => 'Je veux acheter un cadeau', 'code_couleur' => 'phrase'],
        ];

        foreach ($rows as $index => $row) {
            Lecon::create(array_merge($row, [
                'chapitre_id' => $chapitre->id,
                'ordre' => $ordre++,
            ]));
        }
    }
}
